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
        Schema::create('nilai', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('nisn_siswa');
            $table->foreign('nisn_siswa')->references('nisn')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_matpel');
            $table->foreign('kode_matpel')->references('kode')->on('matpel')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('nilai');
            $table->string('predikat', 1);
            $table->string('ket')->nullable();
            $table->timestamps();
            $table->primary(['nisn_siswa','kode_matpel']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
};
