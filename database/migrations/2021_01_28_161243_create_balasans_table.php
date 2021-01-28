<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balasans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('komentar_id');
            $table->unsignedBigInteger('user_id');
            $table->text('balasan');
            $table->text('file')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('komentar_id')
                    ->references('id')->on('komentars')
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
        Schema::dropIfExists('balasans');
    }
}
