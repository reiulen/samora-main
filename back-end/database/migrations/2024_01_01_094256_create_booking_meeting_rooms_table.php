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
        Schema::create('booking_meeting_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_meeting_id');
            $table->string('title_meeting');
            $table->string('reservation_name');
            $table->dateTime('duration_start')->default(now());
            $table->dateTime('duration_end')->default(now());
            $table->text('purpose');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_meeting_rooms');
    }
};
