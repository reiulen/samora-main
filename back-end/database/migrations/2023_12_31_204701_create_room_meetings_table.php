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
        Schema::create('room_meetings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('location_room_meeting_id')->constrained('location_room_meetings');
            $table->string('description')->nullable();
            $table->string('capacity')->nullable();
            $table->time('minimum_time');
            $table->time('maximum_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_meetings');
    }
};
