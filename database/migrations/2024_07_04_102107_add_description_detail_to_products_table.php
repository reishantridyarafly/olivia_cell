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
        Schema::table('products', function (Blueprint $table) {
            $table->string('cover_photo')->after('id');
            $table->text('network')->after('color')->nullable();
            $table->text('audio')->after('network')->nullable();
            $table->text('wlan')->after('audio')->nullable();
            $table->text('bluetooth')->after('wlan')->nullable();
            $table->text('memory_slot')->after('bluetooth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('network');
            $table->dropColumn('audio');
            $table->dropColumn('wlan');
            $table->dropColumn('bluetooth');
            $table->dropColumn('memory_slot');
        });
    }
};
