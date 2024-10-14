<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form', function (Blueprint $table) {
            $table->integer('id_form')->autoIncrement();
            $table->string('nama_form');
            $table->longText('isi_form');
            $table->string('gambar_form');
            $table->integer('id_task');

            $table->foreign('id_task')->references('id_task')->on('task');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form');
    }
};
