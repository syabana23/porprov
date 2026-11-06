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
        Schema::table('contingents', function (Blueprint $table) {
            $table->string('province')->nullable()->after('slug');
            $table->string('regency')->nullable()->after('province');
            $table->integer('athlete_count')->default(0)->after('regency');
            $table->integer('official_count')->default(0)->after('athlete_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contingents', function (Blueprint $table) {
            $table->dropColumn(['province', 'regency', 'athlete_count', 'official_count']);
        });
    }
};
