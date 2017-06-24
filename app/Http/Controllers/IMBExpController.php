<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use Session;
use DB;

class IMBExpController extends Controller
{
    public function index()
    {
      $get = Site::select('site.id', 'site_id', 'site.alamat', 'tanggal', DB::RAW('DATEDIFF(NOW(), DATE_ADD(tanggal, INTERVAL 3 YEAR)) as days'), 'nama_vendor')
        ->join('vendor', 'vendor.id', '=', 'site.vendor_id')
        ->get();
      return view('imb.index')->with('data', $get);
    }

    public function update($id, $date)
    {
      $set = Site::find($id);
      $set->tanggal = $date;
      $set->save();

      Session::flash('success', 'Berhasil mengubah data IMB.');
      return redirect()->route('imb.index');
    }
}
