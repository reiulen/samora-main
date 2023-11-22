<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::latest()->get();
        return view('pages.gallery.index', compact('data'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        if ($request->has('image')) {
            $image = $request->file('image');
        }
        try {
            if ($request->type == 'photo') {
                $image->storeAs('public/gallery/', $image->hashName());
                $data = Gallery::create([
                    'title' => $request->title,
                    'type' => $request->type,
                    'url' => $image->hashName()
                ]);
            } else {
                $data = Gallery::create([
                    'title' => $request->title,
                    'type' => $request->type,
                    'url' => $request->url
                ]);
            }
            DB::commit();
            Session::flash('message', "Success! Data successfully stored"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            if ($request->has('image')) {
                Storage::delete('public/gallery/'.$image->hashName());
            }
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function show(Gallery $gallery)
    {
        return $gallery;
    }

    public function update(Request $request, Gallery $gallery)
    {
        DB::beginTransaction();
        try {
            $gallery->title = $request->title_edit;
            if ($request->type_edit == 'photo' && $request->has('image_edit')) {
                $image = $request->file('image_edit');
                $image->storeAs('public/gallery/', $image->hashName());
                Storage::delete('public/gallery/'.$gallery->image);
                $gallery->url = $image->hashName();
            } elseif ($request->type_edit == 'video') {
                $gallery->url = $request->url_edit;
            }
            $gallery->save();
            DB::commit();
            Session::flash('message', "Success! Data successfully stored"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function destroy(Gallery $gallery)
    {
        DB::beginTransaction();
        try {
            if ($gallery->type == 'photo') {
                Storage::delete('public/gallery/'.$gallery->url);
            }
            $gallery->delete();
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
