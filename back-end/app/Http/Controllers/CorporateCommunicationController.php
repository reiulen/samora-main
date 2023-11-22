<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\CorporateCommunication;
use App\Models\Type;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CorporateCommunicationController extends Controller
{
    public function index()
    {
        $data = CorporateCommunication::latest()->get();
        $type = Type::all()->pluck('name');
        return view('pages.corporate-communication.index', compact('data', 'type'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $file = $request->file('file');
        $fileName = Str::random() . '_' . $file->getClientOriginalName();
        try {
            $file->storeAs('public/corporate-communication/', $fileName);
            $data = CorporateCommunication::create([
                'title' => $request->title,
                'type' => $request->type,
                'path' => $fileName
            ]);
            DB::commit();
            Session::flash('message', "Success! Data successfully stored"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            if ($request->has('file')) {
                Storage::delete('public/corporate-communication/'.$file->getClientOriginalName());
            }
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function show(CorporateCommunication $corporate_communication)
    {
        return $corporate_communication;
    }

    public function update(Request $request, CorporateCommunication $corporate_communication)
    {
        DB::beginTransaction();
        try {
            $corporate_communication->title = $request->title_edit;
            $corporate_communication->type = $request->type_edit;
            if ($request->has('file_edit')) {
                $file = $request->file('file_edit');
                $fileName = Str::random() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/corporate-communication/', $fileName);
                Storage::delete('public/corporate-communication/'.$corporate_communication->path);
                $corporate_communication->path = $fileName;
            }
            $corporate_communication->save();
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

    public function destroy(CorporateCommunication $corporate_communication)
    {
        DB::beginTransaction();
        try {
            Storage::delete('public/corporate-communication/'.$corporate_communication->path);
            $corporate_communication->delete();
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
