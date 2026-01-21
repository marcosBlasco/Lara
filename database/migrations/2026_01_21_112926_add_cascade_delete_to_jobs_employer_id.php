<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('job_listings', function (Blueprint $table) {
        $table->foreign('employer_id')
            ->references('id')
            ->on('employers')
            ->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('job_listings', function (Blueprint $table) {
        $table->dropForeign(['employer_id']);
    });
}
};