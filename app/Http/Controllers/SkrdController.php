<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skrd as Skrd;
use App\Vendor as Vendor;
use Illuminate\Support\Facades\Input;
class SkrdController extends Controller
{
  public function index()
  {
    return view('skrd.main');
  }
  public function data()
  {
    $kd = Skrd::where('status_tampil','=','1')->orderBy('tahun', 'desc')->orderBy('no_skrd', 'desc')->get();
    $data=array('kd'=>$kd);
    return view('skrd.data',$data);
  }
  public function form($id=-1)
  {
    $d=$n=array();
    if($id!=-1)
    {
      $d=Skrd::findOrFail($id);
    }
    $vendor=vendor::where('status_tampil','=','1')->orderBy('nama_vendor','asc')->get();
    $data=array('d'=>$d,'id'=>$id,'vendor'=>$vendor);
    return view('skrd.form',$data);
  }

  public function process($id=-1)
  {
    $d=Input::all();
    // print_r($d);
    $d['updated_at']=date('Y-m-d H:i:s');
    if($id!=-1)
    {
        $save=Skrd::find($id);
        $ss=$save->update($d);
        if($ss)
          echo 'Data SKRD Sudah Di Edit';
        else
          echo 'Data SKRD Gagal Di Edit';
    }
    else
    {
        $d['created_at']=date('Y-m-d H:i:s');
        $save = Skrd::insert($d);
        if($save)
          echo 'Data SKRD Sudah Di Simpan';
        else
          echo 'Data SKRD Gagal Di Simpan';
    }
  }
  function hapus($id)
  {
    $d=Skrd::find($id);
    $d->status_tampil='0';
    $c=$d->save();
    if($c)
      return 'Data SKRD Berhasil Di Hapus';
    else
      return 'Data SKRD Gagal Di Hapus';
  }
}
