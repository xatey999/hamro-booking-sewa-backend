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
        Schema::create('hotel_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('title');
            $table->longText('description');
            $table->string('phone_number');
            $table->string('email');
            $table->string('slug');
            $table->string('hotel_status');
            $table->longText('photos');
            $table->string('location');
            $table->string('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_details');
    }
};
