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
            $table->text('os')->after('weight')->nullable();
            $table->text('processor')->after('os')->nullable();
            $table->text('GPU')->after('processor')->nullable();
            $table->text('ram')->after('GPU')->nullable();
            $table->text('capacity')->after('ram')->nullable();
            $table->text('screen_size')->after('capacity')->nullable();
            $table->text('screen_type')->after('screen_size')->nullable();
            $table->text('screen_resolution')->after('screen_type')->nullable();
            $table->text('rear_camera')->after('screen_resolution')->nullable();
            $table->text('front_camera')->after('rear_camera')->nullable();
            $table->text('sensor')->after('front_camera')->nullable();
            $table->text('battery')->after('sensor')->nullable();
            $table->text('charging')->after('battery')->nullable();
            $table->text('dimension')->after('charging')->nullable();
            $table->text('color')->after('dimension')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('os');
            $table->dropColumn('processor');
            $table->dropColumn('GPU');
            $table->dropColumn('ram');
            $table->dropColumn('capacity');
            $table->dropColumn('screen_size');
            $table->dropColumn('screen_type');
            $table->dropColumn('screen_resolution');
            $table->dropColumn('rear_camera');
            $table->dropColumn('front_camera');
            $table->dropColumn('sensor');
            $table->dropColumn('battery');
            $table->dropColumn('charging');
            $table->dropColumn('dimension');
        });
    }
};
