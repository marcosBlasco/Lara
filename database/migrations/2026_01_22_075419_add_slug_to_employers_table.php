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
        // Schema::table('employers', function (Blueprint $table) {
        //     $table->string('slug')->unique();
        // });
        // Schema::table('employers', function (Blueprint $table) {
        //     $table->string('slug')->nullable()->after('name');
        // });
        Schema::table('employers', function (Blueprint $table) {
        if (!Schema::hasColumn('employers', 'slug')) {
            $table->string('slug')->nullable()->after('name');
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
        if (Schema::hasColumn('employers', 'slug')) {
            $table->dropColumn('slug');
        }
    });
    }
};
