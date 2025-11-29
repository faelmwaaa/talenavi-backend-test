<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('todos', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Req: string, required
        $table->string('assignee')->nullable(); // Req: string, optional
        $table->date('due_date'); // Req: date
        $table->integer('time_tracked')->default(0); // Req: numeric, default 0
        $table->enum('status', ['pending', 'open', 'in_progress', 'completed'])->default('pending'); // Req: default pending
        $table->enum('priority', ['low', 'medium', 'high']); // Req: specific enum values
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
