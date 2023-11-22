<?php

namespace App\Http\Controllers;
use App\Models\QuickLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    public function index ()
    {
        $data = QuickLink::latest()->get();
        return view('pages.quick-link.index', compact('data'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $file = $request->file('icon');

        try {
            $fileName = Str::slug($request->nama) . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/quick-link/', $fileName);
            $data = QuickLink::create([
                'nama' => $request->nama,
                'icon' => $fileName,
                'url' => $request->url
            ]);
            DB::commit();
            Session::flash('message', "Success! Data successfully stored"); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            if ($request->has('file')) {
                Storage::delete('public/quick-link/'.$file->getClientOriginalName());
            }
            DB::rollback();
            Session::flash('message', "Error! {$e->getMessage()}"); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function updateTargetActive(Request $request, $id)
    {
        try {
            $data = QuickLink::findOrFail($id);
            $data->target = $request->target === "true" ? 1 : 0;
            $data->save();
            return response()->json(['success' => 'Status target berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show(QuickLink $quick_link)
    {
        return $quick_link;
    }

     public function update(Request $request, QuickLink $quick_link)
    {
        DB::beginTransaction();
        try {
            $quick_link->nama = $request->nama_edit;
            $quick_link->url = Str::slug($request->nama_edit);
            if ($request->has('icon_edit')) {
                $file = $request->file('icon_edit');
                $fileName = Str::slug($request->nama_edit).".".     $file->getClientOriginalExtension();
                $file->storeAs('public/quick-link/', $fileName);
                Storage::delete('public/quick-link/'.$quick_link->icon);
                $quick_link->icon = $fileName;
            }
            $quick_link->save();
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

    public function destroy(QuickLink $quick_link)
    {
        DB::beginTransaction();
        try {
            Storage::delete('public/quick-link/'.$quick_link->icon);
            $quick_link->delete();
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
