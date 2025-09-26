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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("author");
            $table->longText("title");
            $table->integer("pieces")->default(100);
            $table->timestamps();
        });

        DB::table('books')->insert([
            'author' => 'J.K. Rowling',
            'title' => 'Harry Potter és a Bölcsek Köve',
            'pieces' => 50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'author' => 'J.R.R. Tolkien',
            'title' => 'A Gyűrűk Ura',
            'pieces' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'author' => 'George Orwell',
            'title' => '1984',
            'pieces' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
