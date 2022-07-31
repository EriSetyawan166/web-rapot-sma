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
            // $table->engine = 'InnoDB';
            $table->id();
            $table->string('nisn_siswa');
            $table->foreign('nisn_siswa')->references('nisn')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_matpel');
            $table->foreign('kode_matpel')->references('kode')->on('matpel')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('nilai');
            $table->string('predikat', 1);
            $table->string('ket')->nullable();
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->string('semester',1);
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
        Schema::dropIfExists('nilai');
    }
};
