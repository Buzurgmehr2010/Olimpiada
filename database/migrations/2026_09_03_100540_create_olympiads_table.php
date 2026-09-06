<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('olympiads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('country');
            $table->string('level');
            $table->string('date');
            $table->string('cost');
            $table->string('icon')->default('geo-alt');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('olympiads');
    }
};
