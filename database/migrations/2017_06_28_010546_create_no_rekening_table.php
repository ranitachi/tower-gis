<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoRekeningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_rekening', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_rekening',50);
            $table->string('kode_rekening',50);
            $table->string('nama_rekening')->nullable();
            $table->integer('status_tampil')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('no_rekening');
    }
}
