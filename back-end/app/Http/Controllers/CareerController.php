<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CareerController extends Controller
{
    public function index()
    {
        $data = Career::latest()->get();
        return view('pages.career.index', compact('data'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = Career::create([
                'title' => $request->title,
                'location' => $request->location,
                'url' => $request->url,
            ]);
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

    public function updateItemActive(Request $request, $id)
    {
        try {
            $data = Career::findOrFail($id);
            $data->is_active = $request->is_active === "true" ? 1 : 0;
            $data->save();
            return response()->json(['success' => 'Status is_active berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show(Career $career)
    {
        return $career;
    }

    public function update(Request $request, Career $career)
    {
        DB::beginTransaction();
        try {
            $career->title = $request->title_edit;
            $career->location = $request->location_edit;
            $career->url = $request->url_edit;
            $career->save();
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

    public function destroy(Career $career)
    {
        $career->delete();
        Session::flash('message', "Success! Data successfully deleted"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
