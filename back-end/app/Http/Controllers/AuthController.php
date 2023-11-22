<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        } else {
            return view('pages.auth.index');
        }
    }

    public function post(Request $request)
    {
        try {
            $attempt = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if (!$attempt) throw new \Exception('Username atau password salah');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Session::flash('message', "Error! {$e->getMessage()}");
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back()->withInput($request->input());
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('message', 'Berhasil logout');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('login');
    }
}
