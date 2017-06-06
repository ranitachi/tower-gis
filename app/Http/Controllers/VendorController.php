<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor as Vendor;
use Illuminate\Support\Facades\Input;
class VendorController extends Controller
{
	public function index()
	{
		$vendor=Vendor::orderBy('nama_vendor', 'asc')->get();
		$data=array('vendor'=>$vendor,'title'=>'Vendor Page');
		return view('vendor.vendor',$data);
	}
	public function Vendor()
	{
		$vendor=Vendor::orderBy('nama_vendor', 'asc')->get();
		$data=array('vendor'=>$vendor,'title'=>'Vendor Page');
		return view('vendor.vendor',$data);
	}

	public function VendorJson($id=-1,$datatable=-1)
	{

		if($id==-1)
			$vendor=Vendor::orderBy('nama_vendor', 'asc')->get();
		else
			$vendor=Vendor::find($id);

		$dt='{"data":';
		$d=array();
		foreach ($vendor as $k => $v)
		{
			$d[$k]=$v;
			$d[$k]['no']=($k+1);
			$d[$k]['logo']='';
			$d[$k]['button']='<button class="btn btn-xs btn-primary" type="button" onclick="edit(\''.$v->id.'\')"><i class="fa fa-edit"></i></button><button class="btn btn-xs btn-danger" type="button" onclick="hapus(\''.$v->id.'\')"><i class="fa fa-trash"></i></button>';
		}
		$d=$vendor->toJson();
		$dt=$dt.$d.'}';
		if($datatable==1)
			return $dt;
		else
			return response()->json($vendor);
	}

	public function Vendordata()
	{
		return view('vendor.data');
	}
	public function Vendorform($id=-1)
	{
		$d=array();
		if($id!=-1)
			$d=Vendor::find($id);

		$vendor=Vendor::all();
		$data=array('vendor'=>$vendor,'id'=>$id,'d'=>$d);
		return view('vendor.form',$data);
	}

	public function update(Request $request, $id)
    {
        Vendor::find($id)->update($request->all());
    }
	public function Proccess($id=-1)
	{
	      $data = Input::all();
	      $d=$data;
	      if($id==-1)
	      	$store = Vendor::insert($d);
	      else
	      {
	      	// $d['id']=$id;
	      	$store = Vendor::find($id);
	      	$store->update($d);
	      }
	      echo $store;
    }
    //
}
