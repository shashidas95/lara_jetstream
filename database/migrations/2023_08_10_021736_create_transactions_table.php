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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('amount', 10, 2); // Adjust precision and scale as needed
            $table->string('description');
            $table->enum('type', ['income', 'expense']); // Transaction type
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->casecadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
