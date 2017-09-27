<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
  protected $table="no_rekening";
  protected $fillable = ['no_rekening','nama_bank','kode_rekening','nama_rekening','created_at','updated_at'];
}
