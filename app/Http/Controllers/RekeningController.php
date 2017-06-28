<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rekening as Rekening;
use Illuminate\Support\Facades\Input;
class RekeningController extends Controller
{
  public function index()
  {
    return view('rekening.main');
  }
  public function data()
  {
    $kd = Rekening::where('status_tampil','=','1')->orderBy('kode_rekening', 'asc')->get();
    $data=array('kd'=>$kd);
    return view('rekening.data',$data);
  }
  public function form($id=-1)
  {
    $d=$n=array();
    if($id!=-1)
    {
      $d=Rekening::findOrFail($id);
    }
    $data=array('d'=>$d,'id'=>$id);
    return view('rekening.form',$data);
  }

  public function process($id=-1)
  {
    $d=Input::all();
    // print_r($d);
    $d['updated_at']=date('Y-m-d H:i:s');
    if($id!=-1)
    {
        $save=Rekening::find($id);
        $ss=$save->update($d);
        if($ss)
          echo 'Data Rekening Sudah Di Edit';
        else
          echo 'Data Rekening Gagal Di Edit';
    }
    else
    {
        $d['created_at']=date('Y-m-d H:i:s');
        $save = Rekening::insert($d);
        if($save)
          echo 'Data Rekening Sudah Di Simpan';
        else
          echo 'Data Rekening Gagal Di Simpan';
    }
  }
  function hapus($id)
  {
    $d=Rekening::find($id);
    $d->status_tampil='0';
    $c=$d->save();
    if($c)
      return 'Data Rekening Berhasil Di Hapus';
    else
      return 'Data Rekening Gagal Di Hapus';
  }
}
