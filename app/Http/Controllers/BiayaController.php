<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Biaya as Biaya;
use App\Nilai as Nilai;
use Illuminate\Support\Facades\Input;
class BiayaController extends Controller
{
  public function index()
  {
    return view('biaya.main');
  }

  public function Data()
  {
    $biaya = Biaya::where('status_tampil','=','1')->orderBy('zona', 'asc')->get();
    $data=array('biaya'=>$biaya);
    return view('biaya.data',$data);
  }
  public function Form($id=-1)
  {
    $d=$n=array();
    $n=Nilai::where('status_tampil','=','1')->orderBy('tahun','desc')->get();
    if($id!=-1)
    {
      $d=Biaya::findOrFail($id);
    }
    $data=array('d'=>$d,'id'=>$id,'n'=>$n);
    return view('biaya.form',$data);
  }

  public function Proccess($id=-1)
	{
	      $data = Input::all();
	      $d=$data;

	      if($id==-1)
        {
	      	$store = Biaya::insert($d);
        }
	      else
	      {
          $store = Biaya::find($id);
	      	// $d['id']=$id;
	      	$store->update($d);
	      }
	      echo $store;
    }
    function Hapus($id)
    {
      $d=Biaya::find($id);
      $d->status_tampil='0';
      $c=$d->save();
      if($c)
        return 'Data Biaya Retribusi Berhasil Di Hapus';
      else
        return 'Data Biaya Retribusi Gagal Di Hapus';
    }
    public function FormNilai($id=-1)
    {
      $d=array();
      if($id!=-1)
      {
        $d=Nilai::findOrFail($id);
      }
      $data=array('d'=>$d,'id'=>$id);
      return view('biaya.nilai-form',$data);
    }
    public function DataNilai()
    {
      $biaya = Nilai::where('status_tampil','=','1')->orderBy('tahun', 'desc')->get();
      $data=array('nilai'=>$biaya);
      return view('biaya.nilai-data',$data);
    }
    public function ProccessNilai($id=-1)
  	{
  	      $data = Input::all();
  	      $d=$data;

          // print_r($d);
  	      if($id==-1)
          {
            $d['created_at']= date('Y-m-d H:i:s');
            $d['updated_at']=date('Y-m-d H:i:s');
  	      	$store = Nilai::insert($d);
          }
  	      else
  	      {
            $store = Nilai::find($id);
            // $d['created_at']=$store->created_at;
            $d['updated_at']=date('Y-m-d H:i:s');
  	      	$store->update($d);
  	      }
  	      echo $store;
      }
}
