
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->unsignedBigInteger('cafe_id')->nullable(); // Foreign key to cafes table, nullable
            $table->unsignedBigInteger('musician_id')->nullable(); // Foreign key to musicians table, nullable
            $table->decimal('rating', 3, 2); // Rating as a decimal value (e.g., 4.50)
            $table->text('deskripsi'); // Text column for description
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cafe_id')->references('id')->on('review_cafes')->onDelete('cascade');
            $table->foreign('musician_id')->references('id')->on('review_musicians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
