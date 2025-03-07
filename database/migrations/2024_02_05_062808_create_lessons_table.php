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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('chapter_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('try_learning')->nullable();
            $table->date('release_datetime')->nullable();
            $table->integer('type')->nullable();
            $table->string('video')->nullable();
            $table->string('avatar')->nullable();
            $table->string('description')->nullable();
            $table->integer('order')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
