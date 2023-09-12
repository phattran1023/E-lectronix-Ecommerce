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
            $table->integer('report_id');
         
          
            $table->integer('user_comment');
            $table->tinyInteger('violence')->nullable();
            $table->tinyInteger('hate')->nullable();
            $table->tinyInteger('suicide')->nullable();
            $table->tinyInteger('misinformation')->nullable();
            $table->tinyInteger('frauds')->nullable();
            $table->tinyInteger('deceptive')->nullable();
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
