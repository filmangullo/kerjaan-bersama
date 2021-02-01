<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarHardirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_hadirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pertemuan_id');
            $table->unsignedBigInteger('user_id');
            $table->text('keterangan');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pertemuan_id')
                    ->references('id')->on('pertemuans')
                    ->onDelete('cascade');

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_hardirs');
    }
}
