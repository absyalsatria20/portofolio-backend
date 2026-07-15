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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Untuk 'image' atau 'video'
            $table->string('category'); // Untuk 'graphic' atau 'motion'
            $table->text('src'); // Untuk menyimpan link gambar/video
            $table->string('thumbTime')->nullable(); // Untuk detik thumbnail (nullable = boleh dikosongkan jika gambar)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
