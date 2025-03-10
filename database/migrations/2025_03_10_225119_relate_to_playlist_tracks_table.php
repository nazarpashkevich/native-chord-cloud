<?php

use App\Domains\Media\Models\Playlist;
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
        Schema::rename('uploaded_tracks', 'tracks');
        Schema::table('tracks', function (Blueprint $table) {
            $table->foreignIdFor(Playlist::class)->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->dropForeignIdFor(Playlist::class);
        });
    }
};
