<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
	protected $table="operator";
	protected $fillable = ['nama_operator', 'alamat'];
	public $timestamps = false;
    //
}
