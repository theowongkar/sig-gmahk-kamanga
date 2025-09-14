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
        Schema::create('worships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('preacher_id')->constrained('congregations')->onDelete('cascade');
            $table->foreignId('mc_id')->constrained('congregations')->onDelete('cascade');
            $table->string('category');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('location');
            $table->timestamps();

            $table->index('category');
        });

        Schema::create('worship_singers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worship_id')->constrained('worships')->onDelete('cascade');
            $table->foreignId('singer_id')->constrained('congregations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worships');
        Schema::dropIfExists('worship_singers');
    }
};
