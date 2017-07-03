<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
  protected $fillable = ['tahun','nilai', 'created_at','updated_at'];
  protected $table="nilai";
    //
}
