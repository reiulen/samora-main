<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get();
        return view('pages.users.index', compact('data'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->url),
                'role' => $request->role
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

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        DB::beginTransaction();
        try {
            $user->name = $request->name_edit;
            $user->email = $request->email_edit;
            $user->role = $request->role_edit;
            if ($request->password_edit) {
                $user->password = bcrypt($request->password_edit);
            }
            $user->save();
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

    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('message', "Success! Data successfully deleted");
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
