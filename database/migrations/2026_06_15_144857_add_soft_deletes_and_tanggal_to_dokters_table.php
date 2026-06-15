<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->date('tanggal')->nullable();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->dropColumn('tanggal');
            $table->dropSoftDeletes();
        });
    }
};