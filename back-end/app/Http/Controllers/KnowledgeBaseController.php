<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KnowledgeBase;
use App\Models\Funct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class KnowledgeBaseController extends Controller
{
    public function index()
    {
        $data = KnowledgeBase::latest()->get();
        $funct = Funct::all()->pluck('name');
        return view('pages.knowledge-base.index', compact('data', 'funct'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $file = $request->file('file');
        try {
            $fileName = Str::random() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/knowledge-base/', $fileName);
            $data = KnowledgeBase::create([
                'legal' => $request->legal,
                'title' => $request->title,
                'file' => $fileName
            ]);
            DB::commit();
            Session::flash('message', "Success! Data successfully stored"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            if ($request->has('file')) {
                Storage::delete('public/knowledge-base/'.$file->getClientOriginalName());
            }
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function show(KnowledgeBase $knowledge_base)
    {
        return $knowledge_base;
    }

    public function update(Request $request, KnowledgeBase $knowledge_base)
    {
        DB::beginTransaction();
        try {
            $knowledge_base->legal = $request->legal_edit;
            $knowledge_base->title = $request->title_edit;
            if ($request->has('file_edit')) {
                $file = $request->file('file_edit');
                $fileName = Str::random() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/knowledge-base/', $fileName);
                Storage::delete('public/knowledge-base/'.$knowledge_base->file);
                $knowledge_base->file = $fileName;
            }
            $knowledge_base->save();
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

    public function destroy(KnowledgeBase $knowledge_base)
    {
        DB::beginTransaction();
        try {
            Storage::delete('public/knowledge-base/'.$knowledge_base->file);
            $knowledge_base->delete();
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
