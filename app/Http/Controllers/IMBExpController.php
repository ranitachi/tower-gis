<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use DB;

class IMBExpController extends Controller
{
    public function index()
    {
      $get = Site::select('site.id', 'site_id', 'site.alamat', 'tanggal', DB::RAW('DATEDIFF(NOW(), tanggal) as days'), 'nama_vendor')
        ->join('vendor', 'vendor.id', '=', 'site.vendor_id')
        ->get();
        
      return view('imb.index')->with('data', $get);
    }
}
