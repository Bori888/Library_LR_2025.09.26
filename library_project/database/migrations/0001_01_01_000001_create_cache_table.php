<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        DB::table('cache')->insert([
            'key' => 'elso',
            'value' => 'Első cache tartalom',
            'expiration' => time() + 3600,
        ]);
        DB::table('cache')->insert([
            'key' => 'második',
            'value' => '2. cache tartalom',
            'expiration' => time() + 3600,
        ]);
        DB::table('cache')->insert([
            'key' => 'harmadik',
            'value' => '3. cache tartalom',
            'expiration' => time() + 3600,
        ]);

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });

        DB::table('cache_locks')->insert([
            'key' => 'lock_user_1',
            'owner' => 'system',
            'expiration' => time() + 120,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
