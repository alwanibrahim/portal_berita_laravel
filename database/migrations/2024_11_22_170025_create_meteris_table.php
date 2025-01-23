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
        Schema::create('meteri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_materi');
            $table->text('slug');
            $table->text('link');
            $table->integer('playlist_id');
            $table->text('deskripsi');
            $table->integer('is_active');
            $table->text('gambar_materi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meteri');
    }
};
