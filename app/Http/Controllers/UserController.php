<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

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

    public function logout()
    {
      Auth::logout();
      return redirect()->route('login.index');
    }

    public function manageuser()
    {
      $get = User::orderby('created_at', 'desc')->paginate(10);
      return view('users.index')->with('datauser', $get);
    }

    public function store(Request $request)
    {
      $set = new User;
      $set->name = $request->name;
      $set->email = $request->email;
      $set->password = $request->password;
      $set->save();

      return redirect()->route('user.manage')->with('success', 'Berhasil menambahkan user baru.');
    }

    public function bind($id)
    {
      $get = User::find($id);
      return $get;
    }

    public function update(Request $request, $id)
    {
      $set = User::find($id);
      if ($request->check) {
        $set->name = $request->name;
        $set->email = $request->email;
        $set->password = Hash::make($request->password);
      } else {
        $set->name = $request->name;
        $set->email = $request->email;
      }
      $set->save();

      return redirect()->route('user.manage')->with('success', 'Berhasil mengubah data user.');
    }

    public function destroy($id)
    {
      $set = User::find($id);
      $set->delete();

      return redirect()->route('user.manage')->with('success', 'Berhasil menghapus data user.');
    }

    public function changestatus($id)
    {
      $set = User::find($id);
      if ($set->flag_status==1) {
        $set->flag_status=0;
      } else {
        $set->flag_status=1;
      }
      $set->save();

      return redirect()->route('user.manage')->with('success', 'Berhasil mengubah status data user.');
    }
}
