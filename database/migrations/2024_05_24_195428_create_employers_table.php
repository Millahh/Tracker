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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('task_name');
            $table->string('task_desc');
            $table->json('task_checkpoints');
            $table->json('task_progress')->nullable();
            $table->date('task_due');
            $table->json('task_assignments')->nullable();
            $table->text('file')->nullable();
            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
