<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	protected $table="vendor";
	protected $fillable = ['nama_vendor', 'nama_pimpinan', 'telp','alamat'];
	public $timestamps = false;
    //
}
