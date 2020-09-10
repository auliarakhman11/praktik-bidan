<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nik_ibu',30)->nullable();
            $table->string('nik_ayah',30)->nullable();
            $table->string('nm_ibu',30);
            $table->string('nm_ayah',30)->nullable();
            $table->date('tgl_lahir_ibu');
            $table->date('tgl_lahir_ayah');
            $table->string('no_tlpn',13)->nullable();
            $table->string('alamat',30)->nullable();
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
        Schema::dropIfExists('pasien');
    }
}
