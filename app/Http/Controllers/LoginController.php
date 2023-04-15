<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function submit(LoginRequest $req)
    {
        if ($req->username != 'superadmin') {
            return redirect()->route('login')->withErrors(['message' => 'username tidak ditemukan']);
        }

        if ($req->password != 'superadmin') {
            return redirect()->route('login')->withErrors(['message' => 'password salah']);
        }

        Session::put('id', '1');

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Session::flush();

        return redirect()->route('login');
    }
}
