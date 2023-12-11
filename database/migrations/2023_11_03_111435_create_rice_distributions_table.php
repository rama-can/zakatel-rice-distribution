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
        Schema::create('rice_distributions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('content');
            $table->string('author');
            $table->string('start_address')->nullable()->default('107.63204, -6.90938');
            $table->string('final_address')->nullable()->default(null);
            $table->text('destination');
            $table->date('distribution_date');
            $table->integer('quantity_distributed');
            $table->string('status')->default('pending');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rice_distributions');
    }
};