<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {

            // Tambah kolom message jika belum ada
            if (!Schema::hasColumn('donations', 'message')) {
                $table->text('message')->nullable();
            }

            // Tambah kolom payment_method jika belum ada
            if (!Schema::hasColumn('donations', 'payment_method')) {
                $table->string('payment_method')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            if (Schema::hasColumn('donations', 'message')) {
                $table->dropColumn('message');
            }
            if (Schema::hasColumn('donations', 'payment_method')) {
                $table->dropColumn('payment_method');
            }
        });
    }
};
