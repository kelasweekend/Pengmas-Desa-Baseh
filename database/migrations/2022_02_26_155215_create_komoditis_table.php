<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomoditisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komoditis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('keluarga_id');
            $table->foreign('keluarga_id')->references('id')->on('keluargas')->onDelete('cascade');
            // peternakan
            $table->string('komoditi_peternakan')->nullable();
            $table->string('volume_peternakan')->nullable();
            // perikanan
            $table->string('komoditi_perikanan')->nullable();
            $table->string('volume_perikanan')->nullable();
            // warung
            $table->string('komoditi_warung')->nullable();
            $table->string('volume_warung')->nullable();
            // toga
            $table->string('komoditi_toga')->nullable();
            $table->string('volume_toga')->nullable();
            // lumbung hidup
            $table->string('komoditi_lumbung')->nullable();
            $table->string('volume_lumbung')->nullable();
            // tanaman
            $table->string('komoditi_tanaman')->nullable();
            $table->string('volume_tanaman')->nullable();
            // pangan
            $table->string('komoditi_pangan')->nullable();
            $table->string('volume_pangan')->nullable();
            // sandang
            $table->string('komoditi_sandang')->nullable();
            $table->string('volume_sandang')->nullable();
            // jasa
            $table->string('komoditi_jasa')->nullable();
            $table->string('volume_jasa')->nullable();
            // lainnya
            $table->string('komoditi_lainnya')->nullable();
            $table->string('volume_lainnya')->nullable();
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
        Schema::dropIfExists('komoditis');
    }
}
