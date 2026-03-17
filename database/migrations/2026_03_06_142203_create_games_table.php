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
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            // A game always have a user attached to it
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // PriceCharting data
            $table->integer('pc_id')->nullable();
            $table->string('name');
            $table->string('console_name');

            // State and price of the game
            $table->string('condition');
            $table->decimal('price', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
