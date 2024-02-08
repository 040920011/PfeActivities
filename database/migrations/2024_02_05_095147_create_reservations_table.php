<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('CASCADE');
            $table->unsignedbigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('CASCADE');
            $table->enum('status',StatusEnum::values())->default(StatusEnum::Pending->value);
            $table->integer('nbrPeople');
            $table->date('reservation_time');
            $table->integer('hour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
