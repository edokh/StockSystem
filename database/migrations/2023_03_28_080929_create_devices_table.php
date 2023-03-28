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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('device_type_id');
            $table->unsignedBigInteger('room_id');
            $table->string('status');
            $table->longText('properties_about');

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('device_type_id')->references('id')->on('device_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
