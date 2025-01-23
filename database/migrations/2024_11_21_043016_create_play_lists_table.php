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
        Schema::create('play_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_playlist');
            $table->text('slug');
            $table->text('deskripsi');
            $table->integer('user_id');
            $table->text('gambar_playlist');
            $table->integer('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlists');
    }
};
