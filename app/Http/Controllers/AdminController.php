<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor as Vendor;
use App\Site as Site;
use App\Operator as Operator;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
      $site = Site::all();
      $vendor = Vendor::count();
      $operator = Operator::count();
      $user = User::count();

    	return view('admin.dashboard.main')
        ->with('site', $site)
        ->with('vendor', $vendor)
        ->with('user', $user)
        ->with('operator', $operator);
    }
}
