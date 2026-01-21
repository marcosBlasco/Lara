<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employers', function (Blueprint $table) {

            // 1️⃣ Asegurar 1 employer por user
            $table->unique('user_id');

            // 2️⃣ Agregar campos nuevos
            $table->text('description')->nullable()->after('name');
            $table->string('website')->nullable()->after('description');
            $table->string('location')->nullable()->after('website');
            $table->string('logo')->nullable()->after('location');
        });
    }

    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropUnique(['user_id']);

            $table->dropColumn([
                'description',
                'website',
                'location',
                'logo',
            ]);
        });
    }
};