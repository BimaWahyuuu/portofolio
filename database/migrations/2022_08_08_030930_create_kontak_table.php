<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_kontak_siswa', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('siswa_id')->unsigned();
            $table->foreign('siswa_id')->references('id')->on('siswa')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->BigInteger('jenis_id')->unsigned();
            $table->foreign('jenis_id')->references('id')->on('jenis_kontak')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->char('deskripsi');
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
        Schema::dropIfExists('kontak');
    }
};
