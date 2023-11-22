<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function index()
    {
        $data = Event::latest()->get();
        return view('pages.event.index', compact('data'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = Event::create([
                'event' => $request->event,
                'date' => $request->date
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

    public function show(Event $event)
    {
        return $event;
    }

    public function update(Request $request, Event $event)
    {
        DB::beginTransaction();
        try {
            $event->event = $request->event_edit;
            $event->date = $request->date_edit;
            $event->save();
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

    public function destroy(Event $event)
    {
        $event->delete();
        Session::flash('message', "Success! Data successfully deleted"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
