<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->string("desa_wisma");
            $table->integer("rt");
            $table->integer("rw");
            $table->string("desa");
            $table->string("kecamatan");
            $table->string("nama_kepala_keluarga");
            $table->integer("jumlah_anggota_keluarga");
            $table->integer("pria");
            $table->integer("wanita");
            $table->integer("jumlah_kk");
            $table->integer("balita");
            $table->integer("pus");
            $table->integer("wus");
            $table->integer("ibu_menyusui");
            $table->integer("lansia");
            $table->integer("buta");
            $table->integer("ibu_hamil");
            $table->string("kebutuhan_khusus");
            // bagian bawah
            $table->string("makanan_pokok");
            $table->enum("jamban_keluarga", [0,1]);
            $table->string("sumber_air");
            $table->enum("pembuangan_sampah", [0,1]);
            $table->enum("pembuangan_limbah", [0,1]);
            $table->enum("stiker_p4k", [0,1]);
            $table->enum("kegiatan_usaha_kesehatan", [0,1]);
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
        Schema::dropIfExists('keluargas');
    }
}
