<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->decimal('monthly_salary', 10, 2)->nullable();
            $table->string('approval_status')->nullable();
            $table->text('message')->nullable();
            $table->dateTime('appointment_date')->nullable();
            $table->enum('status', ['new', 'contacted', 'appointment_set', 'closed'])->default('new');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
