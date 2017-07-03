<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
  protected $table="no_rekening";
  protected $fillable = ['no_rekening','kode_rekening','nama_rekening','created_at','updated_at'];
}
