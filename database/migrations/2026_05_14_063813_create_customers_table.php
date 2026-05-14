<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->nullable()->unique(); // ✅ better for real apps
            $table->string('phone', 30)->nullable();       // ✅ limit size for safety
            $table->text('address')->nullable();

            $table->timestamps();

            // (optional but useful if you scale later)
            // $table->index('name');
            // $table->index('phone');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
