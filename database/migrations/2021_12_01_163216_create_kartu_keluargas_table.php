<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_keluargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('keluarga_id');
            $table->foreign('keluarga_id')->references('id')->on('keluargas')->onDelete('cascade');

            $table->string("nomor_kk");
            $table->string("nama_lengkap");
            $table->string("status_keluarga");
            $table->string("status_perkawinan");
            $table->enum("kelamin", ["L","P"]);
            $table->date("ttl");
            $table->string("pendidikan");
            $table->string("pekerjaan");
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
        Schema::dropIfExists('kartu_keluargas');
    }
}
