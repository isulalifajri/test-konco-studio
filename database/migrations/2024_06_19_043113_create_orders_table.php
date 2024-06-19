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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('kode_order');
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('product_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('subtotal');
            $table->enum('status',['Unpaid','Paid','Canceled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
