<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImunisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imunisasi', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade');
            $table->unsignedSmallInteger('users_id');
            $table->string('nm_anak',30)->nullable();
            $table->date('tgl_lahir');
            $table->string('umur',10);
            $table->string('jns_imunisasi', 30);
            $table->string('bb',10);
            $table->unsignedTinyInteger('pb');
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
        Schema::dropIfExists('imunisasi');
    }
}
