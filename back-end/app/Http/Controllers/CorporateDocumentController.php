<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CorporateDocument;
use App\Models\Company;
use App\Models\Funct;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CorporateDocumentController extends Controller
{
    public function index()
    {
        $data = CorporateDocument::latest()->get();
        $company = Company::all()->pluck('name');
        $funct = Funct::all()->pluck('name');
        $type = Type::all()->pluck('name');
        return view('pages.corporate-document.index', compact('data', 'company', 'funct', 'type'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $file = $request->file('file');
        try {
            $fileName = Str::slug($request->title).".".$file->getClientOriginalExtension();
            $file->storeAs('public/corporate-document/', $fileName);
            $data = CorporateDocument::create([
                'function' => $request->funct,
                'company' => $request->company,
                'type' => $request->type,
                'title' => $request->title,
                'path' => $fileName
            ]);
            DB::commit();
            Session::flash('message', "Success! Data successfully stored"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            if ($request->has('file')) {
                Storage::delete('public/corporate-document/'.$file->getClientOriginalName());
            }
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function show(CorporateDocument $corporate_document)
    {
        return $corporate_document;
    }

    public function update(Request $request, CorporateDocument $corporate_document)
    {
        DB::beginTransaction();
        try {
            $corporate_document->function = $request->funct_edit;
            $corporate_document->company = $request->company_edit;
            $corporate_document->type = $request->type_edit;
            $corporate_document->title = $request->title_edit;
            if ($request->has('file_edit')) {
                $file = $request->file('file_edit');
                $fileName = Str::slug($request->title_edit).".".$file->getClientOriginalExtension();
                $file->storeAs('public/corporate-document/', $fileName);
                Storage::delete('public/corporate-document/'.$corporate_document->path);
                $corporate_document->path = $fileName;
            }
            $corporate_document->save();
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

    public function destroy(CorporateDocument $corporate_document)
    {
        DB::beginTransaction();
        try {
            Storage::delete('public/corporate-document/'.$corporate_document->path);
            $corporate_document->delete();
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
