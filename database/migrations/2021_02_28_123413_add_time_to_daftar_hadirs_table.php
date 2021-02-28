<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeToDaftarHadirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftar_hadirs', function (Blueprint $table) {
            $table->dateTime('tanggal_dan_jam', $precision = 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftar_hadirs', function (Blueprint $table) {
            $table->dropColumn('tanggal_dan_jam');
        });
    }
}
