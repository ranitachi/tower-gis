<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor as Vendor;
use App\Site as Site;
use App\Operator as Operator;
use App\User;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
      $site = Site::all();
      $vendor = Vendor::all();
      $operator = Operator::count();
      $user = User::count();

      $chart = Site::select('initial as name', DB::RAW('count(*) as y'))
        ->join('vendor', 'site.vendor_id', '=', 'vendor.id')
        ->groupby('initial')
        ->get();
      $jsonchart = json_encode($chart);

      $arr_imb = array();
      $row_imb = array();
      $today = Carbon::now();
      foreach ($site as $key) {
        $arr_imb["site_tower"] = $key->site_id;
        foreach ($vendor as $ven) {
          if ($ven->id == $key->vendor_id) {
            $arr_imb["vendor"] = $ven->nama_vendor;
            break;
          }
        }
        $imbdate = new Carbon($key->tanggal);
        $arr_imb["tanggal_kadaluarsa"] = $imbdate->addYears(3);
        if ($key->tanggal!="0000-00-00") {
          if ($today->diffInDays($imbdate)>365) {
            $arr_imb["status"] = "telah kadaluarsa lebih dari ".$today->diffInYears($imbdate)." tahun";
            $row_imb[] = $arr_imb;
          } else if ($today->diffInDays($imbdate)>31) {
            $arr_imb["status"] = "telah kadaluarsa lebih dari ".$today->diffInMonths($imbdate)." bulan";
            $row_imb[] = $arr_imb;
          }
        }
      }

    	return view('admin.dashboard.main')
        ->with('site', $site)
        ->with('vendor', $vendor)
        ->with('user', $user)
        ->with('chart', $jsonchart)
        ->with('imbexp', $row_imb)
        ->with('operator', $operator);
    }
}
