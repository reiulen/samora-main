<?php

namespace App\Http\Controllers;

use App\Models\Headline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HeadlineController extends Controller
{
    public function index()
    {
        $data = Headline::latest()->get();
        return view('pages.headline.index', compact('data'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $image = $request->file('image');
        try {
            $image->storeAs('public/headline/', $image->getClientOriginalName());

            $data = Headline::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $image->getClientOriginalName()
            ]);
            DB::commit();
            Session::flash('message', "Success! Data successfully stored"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            Storage::delete('public/headline/'.$image->getClientOriginalName());
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function show(Headline $headline)
    {
        return $headline;
    }

    public function updateItemActive(Request $request, $id)
    {
        try {
            $data = Headline::findOrFail($id);
            $data->is_active = $request->is_active === "true" ? 1 : 0;
            $data->save();
            return response()->json(['success' => 'Status is_active berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Headline $headline)
    {
        DB::beginTransaction();
        try {
            $headline->title = $request->title_edit;
            $headline->content = $request->content_edit;
            if ($request->has('image_edit')) {
                $image = $request->file('image_edit');
                $image->storeAs('public/headline/', $image->getClientOriginalName());
                Storage::delete('public/headline/'.$headline->image);
                $headline->image = $image->getClientOriginalName();
            }
            $headline->save();
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

    public function destroy(Headline $headline)
    {
        DB::beginTransaction();
        try {
            Storage::delete('public/headline/'.$headline->image);
            $headline->delete();
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
