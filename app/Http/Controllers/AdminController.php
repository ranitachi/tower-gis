<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor as Vendor;
use App\Site as Site;
use App\Operator as Operator;
use App\User;
use DB;

class AdminController extends Controller
{
    public function index()
    {
      $site = Site::all();
      $vendor = Vendor::count();
      $operator = Operator::count();
      $user = User::count();

      $chart = Site::select('initial as name', DB::RAW('count(*) as y'))
        ->join('vendor', 'site.vendor_id', '=', 'vendor.id')
        ->groupby('initial')
        ->get();

      $jsonchart = json_encode($chart);

    	return view('admin.dashboard.main')
        ->with('site', $site)
        ->with('vendor', $vendor)
        ->with('user', $user)
        ->with('chart', $jsonchart)
        ->with('operator', $operator);
    }
}
