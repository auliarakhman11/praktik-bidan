<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersalinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persalinan', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('pasien_id');
            $table->unsignedSmallInteger('users_id');
            $table->date('tgl_lahir');
            $table->string('jam_lahir',30);
            $table->unsignedTinyInteger('hamil_ke')->nullable();
            $table->string('umur_hamil',10);
            $table->unsignedTinyInteger('anc_ke')->nullable();
            $table->string('letak_janin',10);
            $table->string('jenis_persalinan',10);
            $table->char('lahir',1);
            $table->char('jenkel',1);
            $table->string('kembar',30)->nullable();
            $table->unsignedSmallInteger('bb');
            $table->unsignedTinyInteger('pb');
            $table->unsignedTinyInteger('lk');
            $table->string('rujuk',30)->nullable();
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
        Schema::dropIfExists('persalinan');
    }
}
