<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::latest()->get();
        return view('pages.news.index', compact('data'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $image = $request->file('thumbnail');
        try {
            $image->storeAs('public/news/', $image->hashName());
            $data = News::create([
                'slug' => Str::slug($request->title).'-'.rand(),
                'title' => $request->title,
                'content' => $request->content,
                'thumbnail' => $image->hashName(),
                'published' => $request->published === "true" ? 1 : 0
            ]);

            DB::commit();
            Session::flash('message', "Success! Data successfully stored"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            Storage::delete('public/news/'.$image->hashName());
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function updateItemPublished(Request $request, $id)
    {
        try {
            $data = News::findOrFail($id);
            $data->published = $request->published === "true" ? 1 : 0;
            $data->save();
            return response()->json(['success' => 'Status is_active berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show(News $news)
    {
        return $news;
    }

    public function update(Request $request, News $news)
    {
        DB::beginTransaction();
        try {
            $news->title = $request->title_edit;
            if ($news->slug != $request->slug_edit) {
                $news->slug = $request->slug_edit."-".rand();
            }
            $news->content = $request->content_edit;
            $news->published = $request->published_edit === "true" ? true : false;
            if ($request->has('thumbnail_edit')) {
                $image = $request->file('image_edit');
                $image->storeAs('public/news/', $image->hashName());
                Storage::delete('public/news/'.$news->thuhmbnail);
                $news->thuhmbnail = $image->hashName();
            }
            $news->save();
            DB::commit();
            Session::flash('message', "Success! Data successfully updated"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function destroy(News $news)
    {
        DB::beginTransaction();
        try {
            Storage::delete('public/news/'.$news->thumbnail);
            $news->delete();
            DB::commit(); 
            Session::flash('message', "Success! Data successfully deleted"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }
}
