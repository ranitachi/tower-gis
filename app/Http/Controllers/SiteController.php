<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Site as Site;
use App\Operator as Operator;
use App\Vendor as Vendor;
use App\Biaya as Biaya;
use Illuminate\Support\Facades\Input;
class SiteController extends Controller
{
	public function index()
	{
		$site=Site::all();
		$data=array('site'=>$site,'title'=>'Site Page');
		return view('site.site',$data);
	}

	public function Site()
	{
		$site=Site::all();
		$data=array('site'=>$site,'title'=>'Site Page');
		return view('site.site',$data);
	}

	public function Import()
	{
		return view('site.import');
	}

	public function FileFormat()
	{
		$file= public_path(). "/files/form-isian.csv";
		$headers = array(
	       'Content-Type: application/csv',
	    );
	    return response()->download($file, 'form-isian.csv', $headers);
	}
	public function UploadFile(Request $request)
	{
		$file = $request->file('import');
		$read=file_get_contents($file->getRealPath());
		$d=explode("\n", $read);
		$data=array();
		$i=0;
		$vendor=Vendor::all();
		$vn=array();
		foreach ($vendor as $k => $v)
		{
			$vn[$v->id]=$v;
		}

		$operator=Operator::where('status_tampil','1')->get();
		$op=$opm=array();

		foreach ($operator as $k => $vv)
		{
			$op[$vv->id]=$vv;
			$om=strtolower(str_replace(' ', '_', $vv->nama_operator));
			$opm[$om]=$vv;
			// echo $om.'<br>';
		}

		foreach ($d as $k => $v)
		{
			if($k!=0)
			{
				if($v!='')
				{
					$f=explode(';', $v);
					// echo count($f).'<br>';
					$opr=explode(',', $f[3]);
					if(count($opr)>1)
					{
						$id_op=explode(',', $f[3]);
						$op_id='';
						foreach ($id_op as $ko => $vo)
						{
							$iom=strtolower(str_replace(' ', '_', trim($vo)));

							if(isset($opm[$iom]))
							{
								$operator_id=$opm[$iom]->id;
								$data[$i]['operator_id']=$operator_id;
								$op_id.=$opm[trim($iom)]->id.',';
							}
							else
							{
								$cek=Operator::where('nama_operator','=',$iom)->get();
								if(count($cek)==0)
								{
									$i_op['nama_operator']=$iom;
									$i_op['status_tampil']='1';
									$i_op['alamat']='';
									$getid=Operator::create($i_op);
									$op_id.=$getid->id.',';

								}
								else {
									# code...
									$op_id.=$cek->id.',';
								}
							}
						}
						$op_id=substr($op_id, 0,-1);
						$data[$i]['operator_id']=$op_id;
					}
					else
					{
						$iom=str_replace(' ', '_', $f[3]);

						if(isset($opm[$iom]))
						{
							$operator_id=$opm[$iom]->id;
							$data[$i]['operator_id']=$operator_id;
						}
						else
						{
							$cek=Operator::where('nama_operator','=',$f[3])->get();
							if(count($cek)==0)
							{
								$i_op['nama_operator']=$f[3];
								$i_op['status_tampil']='1';
								$i_op['alamat']='';
								$getid=Operator::insert($i_op);
								$data[$i]['operator_id']=$getid->id;
							}
							else {
								# code...
								foreach ($cek as $kc => $vc) {
									# code...
									$data[$i]['operator_id']=$vc->id;
								}
							}
						}
					}

					$data[$i]['operator_name']=$f[3];
					$data[$i]['site_id']=$f[1];
					$data[$i]['site_name']=$f[2];
					$data[$i]['alamat']=$f[4];
					$data[$i]['long_koord']=str_replace(',', '.', $f[5]);
					$data[$i]['lat_koord']=str_replace(',', '.',$f[6]);
					$data[$i]['type_power']=$f[7];
					$data[$i]['luas_tanah']=str_replace(',', '.',$f[8]);
					$data[$i]['imb_no']=$f[9];

					if($f[10]!='')
					{
						$date = $f[10];
						$tgl= date('Y-m-d', strtotime($date));
						$data[$i]['tanggal']=$tgl;
					}
					else
						$data[$i]['tanggal']='0000-00-00';

					$data[$i]['tinggi_menara_1']=str_replace(',', '.',$f[11]);
					$data[$i]['njop_m']=str_replace(',', '.',$f[12]);
					$data[$i]['imb_tahun']=$f[13];
					$data[$i]['keterangan']=$f[14];
					$i++;
				}
			}
		}

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		Site::insert($data);
		return redirect('site')->with('message', 'Import Berhasil Dilakukan');

	}
	public function SiteJson($id=-1,$datatable=-1)
	{
		if($id==-1)
			$site=Site::where('status_tampil','=','1')->get();
		else
			$site=Site::find($id);

		$dt='{"data":';
		$d=array();
		foreach ($site as $k => $v)
		{

			$d[$k]=$v;
			$d[$k]['no']=$k+1;
			$d[$k]['koordinat']=$v->lat_koord.' <br> '.$v->long_koord;
			$d[$k]['showmap']='<button class="btn btn-xs btn-primary" type="button" onclick="showmap('.$v->lat_koord.','.$v->long_koord.')"><i class="glyphicon glyphicon-map-marker"></i></button><button class="btn btn-xs btn-danger" type="button" onclick="showstreet('.$v->lat_koord.','.$v->long_koord.')"><i class="glyphicon glyphicon-road"></i></button>';
			$d[$k]['button']='<button class="btn btn-xs btn-primary" type="button" onclick="edit(\''.$v->id.'\')"><i class="fa fa-edit"></i></button><button class="btn btn-xs btn-danger" type="button" onclick="hapus(\''.$v->id.'\')"><i class="fa fa-trash"></i></button>';
			if($v->akurat==1)
			{
				$akurat='<span class="label label-success arrowed-right arrowed-in">Akurat</span>';
			}
			else
				$akurat='<span class="label label-danger arrowed-right arrowed-in">Tidak Akurat</span>';

			$d[$k]['akurat']=$akurat;
			if($v->vendor_id!=null)
			{
				$ven=Vendor::find($v->vendor_id);
				if(count($ven)!=0)
				{
					$d[$k]['vendor']=$ven->nama_vendor;
					$d[$k]['icon']=$ven->logo;
					$d[$k]['initial']=$ven->initial;
				}
				else
				{

					$d[$k]['vendor']='-';
					$d[$k]['icon']='/img/tower-icon.png';
					$d[$k]['initial']='';
				}
			}
			else{
				$d[$k]['vendor']='-';
				$d[$k]['icon']='/img/tower-icon.png';
				$d[$k]['initial']='';
			}
		}
		$d=$site->toJson();
		$dt=$dt.$d.'}';
		if($datatable==1)
			return $dt;
		else
			return response()->json($site);
		// return $id;
	}
	public function SiteByVendor($vendor_id,$jenis)
	{
		$site=Site::select('*','site.alamat as al')->join('vendor','site.vendor_id','vendor.id')
								->where('vendor_id', '=', $vendor_id)->where('vendor.status_tampil','=','1')->get();

		if($jenis=='json')
			return response()->json($site);
		else if($jenis=='combo')
		{
				$cmb= '<select name="site_id" id="site_id" class="chosen-select form-control" data-placeholder="Pilih Data Site">
                <option value="">&nbsp;</option>';
                foreach ($site as $ke => $va)
                {
                	$cmb.= '<option value="'.$va->id.'">'.$va->site_id.' - ['.$va->operator_name.'] - '.$va->al.'</option>';
                }
            $cmb.='</select>';
            return $cmb;
		}
		else
		{
			return $site;
		}

	}
	public function SiteByVendorOperator($vendor_id,$jenis)
	{
		$site=Site::where('vendor_id', '=', $vendor_id)->where('status_tampil','=','1')->get();

		$op=array();
		foreach ($site as $k => $v)
		{
			$o=explode(',', $v->operator_id);
			$on=explode(',', $v->operator_name);
			// echo $v->operator_id.'<br>';
			foreach ($o as $ko => $vo)
			{
				$op[$o[$ko]]=$on[$ko];
			}
		}
		// echo '<pre>';
		// print_r($site->operator_id);
		// echo '</pre>';
		if($jenis=='json')
			return response()->json($op);
		else if($jenis=='combo')
		{
			$cmb= '<select name="operator" id="operator" onchange="setsite('.$vendor_id.',this.value)">
                             <option value="">-Pilih Operator-</option>';
                foreach ($op as $ke => $va)
                {
                	$cmb.= '<option value="'.$ke.'__'.$va.'">'.$va.'</option>';
                }
            $cmb.='</select>';
            return $cmb;
		}
		else
		{
			return $op;
		}

	}
	public function SiteByOperator($vendor_id,$id,$jenis)
	{
		$site=Site::where('vendor_id', '=', $vendor_id)->where('status_tampil','=','1')->get();

		$op=array();
		foreach ($site as $k => $v)
		{
			$dop=explode(',',$v->operator_id);
			if($id!=-1)
			{
				if(in_array($id,$dop))
				{
					$op[$v->id]=$v;
				}
			}
			else
				$op[$v->id]=$v;
		}

		if($jenis=='json')
			return response()->json($op);
		else if($jenis=='combo')
		{
			$cmb= '<select  name="site" id="site" onchange="setpeta('.$vendor_id.',this.value)">
                             <option value="">-Pilih Site-</option>';
                foreach ($op as $ke => $va)
                {
                	$cmb.= '<option value="'.$ke.'__'.$va->site_id.'__'.$va->operator_name.'__'.$va->lat_koord.'__'.$v->long_koord.'">'.$va->site_id.'-'.$va->operator_name.'</option>';
                }
            $cmb.='</select>';
            return $cmb;
		}
		else
		{
			return $op;
		}

	}

	public function Sitedata()
	{
		return view('site.data');
	}
	public function Showmap($lat,$long)
	{
		$data=array('latt'=>$lat,'long'=>$long);
		return view('site.showmap',$data);
	}
	public function Siteform($id=-1)
	{
		$d=array();
		if($id!=-1)
			$d=Site::find($id);

		$operator=Operator::all();
		$vendor=Vendor::all();
		$b=Biaya::where('status_tampil','1')->orderBy('zona','asc')->get();
		$biaya=array();
		foreach ($b as $k => $v)
		{
				if($v->zona!=$v->variabel)
					$biaya[$v->zona][]=$v;
		}
		$data=array('operator'=>$operator,'vendor'=>$vendor,'id'=>$id,'d'=>$d,'biaya'=>$biaya);
		// echo '<pre>';
		// print_r($d);
		// echo '</pre>';
		return view('site.form',$data);
	}

	public function Proccess($id=-1)
	{
	      $data = Input::all();
	      $d=$data;
	      $o_id=$o_name='';
	      foreach ($data['operator'] as $k => $v) {
	      	list($o1,$o2)=explode('-', $v);
	      	$o_id.=$o1.',';
	      	$o_name.=$o2.',';
	      	// $o_name.=$v->nama_operator.',';
	      }
	      $o_id=substr($o_id, 0,-1);
	      $d['operator_id']=$o_id;

	      $o_name=substr($o_name, 0,-1);
	      $d['operator_name']=$o_name;
	      unset($d['operator']);
	      // print_r($d);
				if($id==-1)
				{
	      	$store = Site::insert($d);
					echo 'Data Site Berhasil Di Simpan';
				}
				else
				{
					$store = Site::find($id);
	      	$store->update($d);
					echo 'Data Site Berhasil Di Edit';
				}

    }

    public function Hapus($id)
    {
    	$site = Site::find($id);
			$site->status_tampil='0';
			$hapus=$site->save();
			// $hapus=$site->delete();
			if($hapus)
				return "Data Site Berhasil Di Hapus";
			else
				return "Data Site Gagal Di Hapus";
    }

    //
}
