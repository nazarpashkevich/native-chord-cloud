<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('uploaded_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->string('author')->default('');
            $table->string('album')->default('');
            $table->string('playtime')->default('');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploaded_tracks');
    }
};
