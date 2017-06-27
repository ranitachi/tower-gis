<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kepaladinas as Kepaladinas;
use Illuminate\Support\Facades\Input;
class KepaladinasController extends Controller
{
  public function index()
  {
    return view('kepaladinas.main');
  }
  public function data()
  {
    $kd = Kepaladinas::where('status_tampil','=','1')->orderBy('nama', 'asc')->get();
    $data=array('kd'=>$kd);
    return view('kepaladinas.data',$data);
  }
  public function form($id=-1)
  {
    $d=$n=array();
    if($id!=-1)
    {
      $d=Kepaladinas::findOrFail($id);
    }
    $data=array('d'=>$d,'id'=>$id);
    return view('kepaladinas.form',$data);
  }

  public function process($id=-1)
  {
    $d=Input::all();
    // print_r($d);
    $d['updated_at']=date('Y-m-d H:i:s');
    if($id!=-1)
    {
        $save=Kepaladinas::find($id);
        $ss=$save->update($d);
        if($ss)
          echo 'Data Kepala Dinas Sudah Di Edit';
        else
          echo 'Data Kepala Dinas Gagal Di Edit';
    }
    else
    {
        $d['created_at']=date('Y-m-d H:i:s');
        $save = Kepaladinas::insert($d);
        if($save)
          echo 'Data Kepala Dinas Sudah Di Simpan';
        else
          echo 'Data Kepala Dinas Gagal Di Simpan';
    }
  }
  function hapus($id)
  {
    $d=Kepaladinas::find($id);
    $d->status_tampil='0';
    $c=$d->save();
    if($c)
      return 'Data Kepala Dinas Berhasil Di Hapus';
    else
      return 'Data Kepala Dinas Gagal Di Hapus';
  }
}
