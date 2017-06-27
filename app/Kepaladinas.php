<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kepaladinas extends Model
{
  protected $table="kepala_dinas";
  protected $fillable = ['nama','nip','foto', 'pangkat','golongan','created_at','updated_at'];
}
