<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kb', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->smallInteger('pasien_id');
            $table->smallInteger('users_id');
            $table->char('askeptor',4);
            $table->tinyInteger('umur_ibu');
            $table->tinyInteger('umur_ayah')->nullable();
            $table->string('alamat',30)->nullable();
            $table->tinyInteger('jml_anak')->nullable();
            $table->string('jns_kontrasepsi',20);
            $table->string('post_partum',20)->nullable();
            $table->string('ket',30)->nullable();
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
        Schema::dropIfExists('kb');
    }
}
