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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('city');
            $table->boolean('is_available')->default(1);
            $table->unsignedbigInteger('organizer_id');
            $table->foreign('organizer_id')->references('id')->on('organizers')->onDelete('CASCADE');
            $table->unsignedbigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
