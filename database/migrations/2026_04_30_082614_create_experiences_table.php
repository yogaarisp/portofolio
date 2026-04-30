<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');           // e.g. "Freelancer"
            $table->string('company');         // e.g. "Independent Consultant"
            $table->string('period');          // e.g. "2023 – Present"
            $table->text('description')->nullable();
            $table->json('responsibilities')->nullable(); // JSON array
            $table->string('dot_color')->default('#0d9488'); // timeline dot color
            $table->string('badge_type')->default('outline'); // "filled" or "outline"
            $table->boolean('is_current')->default(false);
            $table->boolean('is_leadership')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
