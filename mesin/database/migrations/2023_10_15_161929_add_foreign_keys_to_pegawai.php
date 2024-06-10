<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('jenispegawai_id');
            $table->unsignedBigInteger('statuspegawai_id');
            $table->unsignedBigInteger('pendidikan_id');
            $table->unsignedBigInteger('jeniskelamin_id');
            $table->unsignedBigInteger('agama_id');

            $table->foreign('jenispegawai_id')->references('id')->on('jenis_pegawais');
            $table->foreign('statuspegawai_id')->references('id')->on('status_pegawais');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans');
            $table->foreign('jeniskelamin_id')->references('id')->on('jenis_kelamins');
            $table->foreign('agama_id')->references('id')->on('agamas');
        });
    }

    public function down()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropForeign(['jenispegawai_id']);
            $table->dropForeign(['statuspegawai_id']);
            $table->dropForeign(['pendidikan_id']);
            $table->dropForeign(['jeniskelamin_id']);
            $table->dropForeign(['agama_id']);

            $table->dropColumn('jenispegawai_id');
            $table->dropColumn('statuspegawai_id');
            $table->dropColumn('pendidikan_id');
            $table->dropColumn('jeniskelamin_id');
            $table->dropColumn('agama_id');
        });
    }

};
