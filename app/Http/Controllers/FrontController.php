<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor as Vendor;
use App\Site as Site;
use App\Operator as Operator;

class FrontController extends Controller
{
    public function index()
    {
    	$operator = Operator::where('status_tampil','=','1')->get();
    	$vendor = Vendor::where('status_tampil','=','1')->get();
    	$site = Site::where('status_tampil','=','1')->get();
    	$data=array('operator'=>$operator,'site'=>$site,'vendor'=>$vendor,);
    	return view('front.dashboard.main',$data);
    }
}
