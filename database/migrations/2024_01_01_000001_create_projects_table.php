<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', ['new_project', 'landed']);
            $table->decimal('price', 12, 2);
            $table->string('location');
            $table->string('developer')->nullable();
            $table->text('description');
            $table->json('features')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->string('size_sqft')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->string('tenure')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('whatsapp_group_link')->nullable();
            $table->string('telegram_channel')->nullable();
            $table->string('registration_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
