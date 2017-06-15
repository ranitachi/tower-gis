<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
  protected $table="tarif_retribusi";
  protected $fillable = ['variabel','zona', 'indeks','biaya','distribusi_biaya'];
  public $timestamps = false;
}
