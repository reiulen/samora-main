<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{
    public function index()
    {
        $data = Leader::orderBy('order')->get();
        return view('pages.leader.index', compact('data'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $image = $request->file('image');
        try {
            $image->storeAs('public/leader/', $image->hashName());

            $data = Leader::create([
                'name' => $request->name,
                'title' => $request->title,
                'order' => $request->order,
                'image' => $image->hashName()
            ]);
            DB::commit();
            Session::flash('message', "Success! Data successfully stored"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            Storage::delete('public/leader/'.$image->hashName());
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function show(Leader $leader)
    {
        return $leader;
    }

    public function update(Request $request, Leader $leader)
    {
        DB::beginTransaction();
        try {
            $leader->name = $request->name_edit;
            $leader->title = $request->title_edit;
            $leader->order = $request->order_edit;
            if ($request->has('image_edit')) {
                $image = $request->file('image_edit');
                $image->storeAs('public/leader/', $image->hashName());
                Storage::delete('public/leader/'.$leader->image);
                $leader->image = $image->hashName();
            }
            $leader->save();
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

    public function destroy(Leader $leader)
    {
        DB::beginTransaction();
        try {
            Storage::delete('public/leader/'.$leader->image);
            $leader->delete();
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
