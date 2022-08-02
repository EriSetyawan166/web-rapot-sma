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
        Schema::create('guru_detail', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('guru_nip')->nullable();
            $table->foreign('guru_nip')->references('nip')->on('guru')->onDelete('cascade')->onUpdate('cascade');
            $table->string('matpel_id')->nullable();
            $table->foreign('matpel_id')->references('kode')->on('matpel')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('guru_detail');
    }
};
