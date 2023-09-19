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
        Schema::create('thread', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->unsignedBigInteger('views_count')->default(0); // Compteur de vues
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->boolean('is_pinned')->default(false); // Booléen pour les threads épinglés
            $table->boolean('is_closed')->default(false); // Booléen pour les threads fermés
            $table->timestamp('closed_at')->nullable(); // Date de fermeture du thread
            $table->timestamp('pinned_at')->nullable(); // Date d'épinglage du thread
            $table->timestamp('published_at')->nullable(); // Date de publication du thread
            $table->foreignId('thread_category_id')->constrained('thread_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thread');
    }
};
