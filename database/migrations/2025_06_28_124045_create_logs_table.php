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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();

            // Snapshot customer
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');
            $table->string('customer_name');
            $table->string('customer_whatsapp');
            $table->text('customer_address');

            // Snapshot order
            $table->foreignId('order_id')->nullable()->constrained()->onDelete('set null');
            $table->date('order_date');
            $table->float('quantity_kg');
            $table->integer('fish_per_kg')->nullable();
            $table->text('notes')->nullable();

            // Optional deskripsi tambahan
            $table->string('description')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
