<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertemuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertemuans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mata_pelajarans_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mata_pelajarans_id')
                    ->references('id')->on('mata_pelajarans')
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
        Schema::dropIfExists('pertemuans');
    }
}
