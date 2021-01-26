<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pertemuan_id');
            $table->text('nama');
            $table->text('link');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pertemuan_id')
                    ->references('id')->on('pertemuans')
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
        Schema::dropIfExists('link_videos');
    }
}
