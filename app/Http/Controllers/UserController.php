<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {
      return view('admin.login.login');
    }

    public function authenticate(Request $request)
    {
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->route('admin.dashboard');
      } else {
        return redirect()->route('login.index')->with('message', 'Periksa kembali username dan password anda.');
      }
    }
}
