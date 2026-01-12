<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // 1. Dropeamos la FK incorrecta
            $table->dropForeign(['job_id']);

            // 2. Creamos la FK correcta
            $table->foreign('job_id')
                ->references('id')
                ->on('job_listings')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Revertimos a la FK anterior (por seguridad)
            $table->dropForeign(['job_id']);

            $table->foreign('job_id')
                ->references('id')
                ->on('jobs')
                ->cascadeOnDelete();
        });
    }
};
