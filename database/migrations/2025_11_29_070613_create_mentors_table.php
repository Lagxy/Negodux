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
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->text('photo');
            $table->string('expertise');
            $table->string('years_experience');
            $table->string('email');
            $table->text('about');
            $table->string('education');
            $table->json('areas_of_expertise');
            $table->json('achievements');
            $table->json('portfolio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
