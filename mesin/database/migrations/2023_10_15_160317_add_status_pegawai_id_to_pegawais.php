<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('agama_id');
            $table->foreign('agama_id')->references('id')->on('agamas');
            $table->unsignedBigInteger('status_pegawai_id');
            $table->foreign('status_pegawai_id')->references('id')->on('status_pegawais');
            $table->unsignedBigInteger('pendidikan_id');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans');
            $table->unsignedBigInteger('jenis_kelamin_id');
            $table->foreign('jenis_kelamin_id')->references('id')->on('jenis_kelamins');
            $table->unsignedBigInteger('jenis_pegawai_id');
            $table->foreign('jenis_pegawai_id')->references('id')->on('jenis_pegawais');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            //
        });
    }
};
