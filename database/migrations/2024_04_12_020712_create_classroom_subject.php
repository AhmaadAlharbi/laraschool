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
        Schema::create('classroom_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ClassRoom::class);
            $table->foreignIdFor(\App\Models\Subject::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_subject');
    }
};