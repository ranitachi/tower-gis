<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Biaya as Biaya;
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
    $d=array();
    if($id!=-1)
    {
      $d=Biaya::findOrFail($id);
    }
    $data=array('d'=>$d,'id'=>$id);
    return view('biaya.form',$data);
  }

  public function Proccess($id=-1)
	{
	      $data = Input::all();
	      $d=$data;
	      if($id==-1)
	      	$store = Biaya::insert($d);
	      else
	      {
	      	// $d['id']=$id;
	      	$store = Biaya::find($id);
	      	$store->update($d);
	      }
	      echo $store;
    }
}
