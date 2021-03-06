<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skrd as Skrd;
use App\Site as Site;
use App\Vendor as Vendor;
use App\Rekening as Rekening;
use App\Kepaladinas as Kepaladinas;
use App\Biaya as Biaya;
use Illuminate\Support\Facades\Input;
class SkrdController extends Controller
{
  public function index()
  {
    // echo Skrd::count();
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
      // $d=Skrd::findOrFail($id);
      $d=Skrd::where('id','=',$id)->get()->first();
    }
    $vendor=vendor::where('status_tampil','=','1')->orderBy('nama_vendor','asc')->get();
    $rek=Rekening::where('status_tampil','=','1')->orderBy('kode_rekening','asc')->get();
    $pejabat=Kepaladinas::where('status_tampil','=','1')->orderBy('nama','asc')->get();
    $data=array('d'=>$d,'id'=>$id,'vendor'=>$vendor,'rek'=>$rek,'pejabat'=>$pejabat);
    return view('skrd.form',$data);
  }

  public function process()
  {
    $d=Input::all();
    $vendor=Vendor::findOrFail($d['vendor_id']);
    $rekening=Rekening::where('kode_rekening','like','%'.$d['kode_rekening'].'%')->get();
    $pejabat=Kepaladinas::where('nama','like','%'.$d['penandatangan'].'%')->get();
    $site=Site::where('status_tampil','=','1')->get();
    $biaya=Biaya::where('status_tampil','=','1')->get();


    $nosk='';
    foreach ($d['site'] as $k => $v)
    {
      $count_id=Skrd::where('status_tampil','=','1')->count();
      if($count_id==0)
        $no_skrd='0001';
      else
      {
        if($count_id<10)
          $no_skrd='000'.($count_id+1);
        else if($count_id>=10 && $count_id<100)
          $no_skrd='00'.($count_id+1);
        else if($count_id>=100 && $count_id<1000)
          $no_skrd='0'.($count_id+1);
        else
          $no_skrd=($count_id+1);
      }

      $save=new Skrd;
      $save->vendor_id = $d['vendor_id'];
      $save->nama_vendor = $vendor->nama_vendor;
      $save->tahun = $d['tahun'];
      // $save->no_skrd = $d['nomor_skrd'];
      $save->no_skrd = $no_skrd;
      $save->no_rekening = $rekening[0]->no_rekening;
      $save->kode_rekening = $d['kode_rekening'];
      $save->status_tampil = '1';
      $save->kepala_dinas = $d['penandatangan'];
      $save->nip = $pejabat[0]->nip;
      $save->retribusi = $d['retribusi'][$k];
      $save->uraian = $d['uraian'][$k];
      $save->site_id = $k;
      $save->save();

      $nosk.=$no_skrd.',';
    }

    return substr($nosk,0,-1);
    // return $d['nomor_skrd'];
  }
  public function hapus($id)
  {
    $d=Skrd::find($id);
    $d->status_tampil='0';
    $c=$d->save();
    if($c)
      return 'Data SKRD Berhasil Di Hapus';
    else
      return 'Data SKRD Gagal Di Hapus';
  }

  public function skrdcetak($id)
  {
    $n=explode(',',$id);

    // if(count($n)>1)
      $skrd=Skrd::whereIn('no_skrd',$n)->where('status_tampil','=','1')->get();
    // else
    //   $skrd=Skrd::where('id',$id)->where('status_tampil','=','1')->get();

    // $skrd=DB::selectRaw("select * from skrd where (no_skrd = :noskrd or id='".$id."') and status_tampil=1",$n)->get();
    // echo count($skrd);
    if(count($skrd)!=0)
    {
      // $rekening=Rekening::where('kode_rekening','like','%'.$skrd[0]->kode_rekening.'%')->get();
      $pejabat=Kepaladinas::where('nama','like','%'.$skrd[0]->kepala_dinas.'%')->get();
      $data=array('id'=>$id,'skrd'=>$skrd,'pejabat'=>$pejabat);
      return view('skrd.cetak',$data);
    }
  }

  public function skrdsum()
  {
    $d=Input::all();
    $vendor=Vendor::findOrFail($d['vendor_id']);
    $rekening=Rekening::where('kode_rekening','like','%'.$d['kode_rekening'].'%')->get();
    $pejabat=Kepaladinas::where('nama','like','%'.$d['penandatangan'].'%')->get();
    $site=Site::where('status_tampil','=','1')->get();
    $biaya=Biaya::where('status_tampil','=','1')->get();
    $s=$b=array();
    foreach ($site as $k => $v)
    {
      $s[$v->id]=$v;
    }
    foreach ($biaya as $k => $v)
    {
      $b[$v->zona.' -- '.$v->variabel]=$v;
    }

    $data=array(
        'vendor'=>$vendor,
        'rekening'=>$rekening,
        'pejabat'=>$pejabat,
        'site'=>$d['pilih'],
        'd'=>$d,
        'b'=>$b,
        'biaya'=>$biaya,
        's'=>$s
      );
    return view('skrd.skrd',$data);
  }
  public function skrdlaporan($tahun=-1)
  {
    $th=$tahun;
    if($tahun==null)
      $th=date('Y');

    $data['tahun']=$th;
    return view('skrd.laporan',$data);
  }
  public function skrdlaporandata($tahun=null)
  {
    $th=$tahun;
    if($tahun==null)
      $th=date('Y');

    if($tahun==-1)
    {
      $d=Skrd::select('tahun')
      ->selectRaw('SUM(retribusi) as total')
      ->where('status_tampil','1')
      ->groupBy('tahun')
      ->get();
    }
    else
    {
      $d=Skrd::select('tahun')
      ->selectRaw('SUM(retribusi) as total')
      ->where('status_tampil','1')
      ->groupBy('tahun')
      ->havingRaw('tahun = '.$th)
      ->get();
    }

    $data['tahun']=$th;
    $data['d']=$d;
    return view('skrd.laporan-data',$data);
  }
  public function skrdlaporancetak($tahun=null)
  {
    $th=$tahun;
    if($tahun==null)
      $th=date('Y');

      if($tahun==-1)
      {
        $d=Skrd::select('tahun')
        ->selectRaw('SUM(retribusi) as total')
        ->groupBy('tahun')
        ->get();
      }
      else
      {
        $d=Skrd::select('tahun')
        ->selectRaw('SUM(retribusi) as total')
        ->groupBy('tahun')
        ->havingRaw('tahun = '.$th)
        ->get();
      }

    $data['tahun']=$th;
    $data['d']=$d;
    return view('skrd.laporan-cetak',$data);
  }
}
