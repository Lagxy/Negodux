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
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->text('image');
            $table->text('description');
            $table->string('owner');
            $table->string('location');
            $table->string('email');
            $table->string('phone');
            $table->string('established');
            $table->string('employees');
            $table->text('needs');
            $table->string('reward');
            $table->json('milestones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
