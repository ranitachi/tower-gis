<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Operator as Operator;
use Illuminate\Support\Facades\Input;
class OperatorController extends Controller
{
   	public function index()
	{
		$operator=Operator::orderBy('nama_operator', 'asc')->get();
		$data=array('operator'=>$operator,'title'=>'Operator Page');
		return view('operator.operator',$data);
	}
	public function Operator()
	{
		$operator=Operator::orderBy('nama_operator', 'asc')->get();
		// $operator=Operator::all();
		$data=array('vendor'=>$operator,'title'=>'Operator Page');
		return view('operator.operator',$data);
	}

	public function OperatorJson($id=-1,$datatable=-1)
	{

		if($id==-1)
			$operator=Operator::orderBy('nama_operator', 'asc')->get();
		else
			$operator=Operator::find($id);

		$dt='{"data":';
		$d=array();
		$i=0;
		foreach ($operator as $k => $v)
		{
			$d[$i]=$v;
			$d[$i]['no']=($i+1);
			$d[$i]['logo']='';
			$d[$i]['button']='<button class="btn btn-xs btn-primary" type="button" onclick="edit(\''.$v->id.'\')"><i class="fa fa-edit"></i></button><button class="btn btn-xs btn-danger" type="button" onclick="hapus(\''.$v->id.'\')"><i class="fa fa-trash"></i></button>';
			$i++;
		}
		$dd=json_encode($d);
		$dt=$dt.$dd.'}';
		if($datatable==1)
			return $dt;
		else
			return response()->json($operator);
	}

	public function Operatordata()
	{
		return view('operator.data');
	}
	public function Operatorform($id=-1)
	{
		$d=array();
		if($id!=-1)
			$d=Operator::find($id);

		$operator=Operator::all();
		$data=array('operator'=>$operator,'id'=>$id,'d'=>$d);
		return view('operator.form',$data);
	}

	public function update(Request $request, $id)
    {
        Operator::find($id)->update($request->all());
    }
	public function Proccess($id=-1)
	{
	      $data = Input::all();
	      $d=$data;
	      if($id==-1)
	      	$store = Operator::insert($d);
	      else
	      {
	      	// $d['id']=$id;
	      	$store = Operator::find($id);
	      	$store->update($d);
	      }
	      echo $store;
    }

	public function DataOperator($id=-1,$jenis)
	{
		if($id==-1)
			$operator=Operator::all();
		else
			$operator=Operator::find($id);

		if($jenis=='json')
			return response()->json($operator);
		else if($jenis=='combo')
		{
			$cmb= '<select name="operator" id="operator">
                             <option value="">-Pilih Operator-</option>';
                foreach ($operator as $ke => $va)
                {
                	$cmb.= '<option value="'.$va->id.'__'.$va->nama_operator.'">'.$va->nama_operator.'</option>';
                }
            $cmb.='</select>';
            return $cmb;
		}
		else
		{
			return $op;
		}
	}
}
