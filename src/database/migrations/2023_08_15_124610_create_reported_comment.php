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
        Schema::create('reported_comment', function (Blueprint $table) {
            $table->id();
            $table->integer('report_id')->references('id')->on('comments');
            $table->integer('reporter_id');
            $table->integer('user_comment');
            $table->tinyInteger('link')->nullable();
            $table->tinyInteger('spaming')->nullable();
            $table->tinyInteger('attiude')->nullable();
            $table->tinyInteger('link')->nullable();
            $table->tinyInteger('spaming')->nullable();
            $table->tinyInteger('attiude')->nullable();
            $table->string('else')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reported_comment');
    }
};
