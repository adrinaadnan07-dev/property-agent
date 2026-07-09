<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->decimal('budget', 12, 2)->nullable()->after('monthly_salary');
            $table->string('location')->nullable()->after('budget');
            $table->string('inquiry_type')->nullable()->after('location');
        });
    }

    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn(['budget', 'location', 'inquiry_type']);
        });
    }
};
