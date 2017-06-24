<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
	protected $table="site";
	protected $fillable = ['njop_m', 'luas_tanah','lokasi_kode', 'long_koord','lat_koord', 'alamat','site_id', 'operator','type_power','imb_no','imb_tahun','keterangan','operator_id','operator_name','vendor_id'];
	public $timestamps = false;

	public function vendor()
	{
		return $this->belongsTo('App\Vendor', 'vendor_id');
	}
}
