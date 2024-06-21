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
            $table->string('network', 100)->after('weight')->nullable();
            $table->string('launch', 100)->after('network')->nullable();
            $table->string('dimension', 100)->after('launch')->nullable();
            $table->string('sim', 100)->after('dimension')->nullable();
            $table->string('type_display', 100)->after('sim')->nullable();
            $table->string('resolution_display', 100)->after('type_display')->nullable();
            $table->string('chipset', 100)->after('resolution_display')->nullable();
            $table->string('memory', 100)->after('chipset')->nullable();
            $table->string('battery', 100)->after('memory')->nullable();
            $table->string('colors', 100)->after('battery')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'network',
                'launch',
                'dimension',
                'sim',
                'type_display',
                'resolution_display',
                'chipset',
                'memory_internal',
                'battery',
                'colors'
            ]);
        });
    }
};
