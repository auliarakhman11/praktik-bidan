<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade');
            $table->unsignedSmallInteger('users_id');
            $table->string('no_kk')->nullable();
            $table->unsignedTinyInteger('g');
            $table->unsignedTinyInteger('p');
            $table->unsignedTinyInteger('a')->nullable();
            $table->date('hpht');
            $table->unsignedTinyInteger('bb');
            $table->string('td',10);
            $table->unsignedTinyInteger('tb');
            $table->string('li_la',10);
            $table->string('hb',10);
            $table->unsignedTinyInteger('tt')->nullable();
            $table->char('gol_darah',2)->nullable();
            $table->string('riwayat_penyakit',30)->nullable();
            $table->string('riwayat_alergi',30)->nullable();
            $table->string('jarak_kehamilan',30)->nullable();
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
        Schema::dropIfExists('pemeriksaan');
    }
}
