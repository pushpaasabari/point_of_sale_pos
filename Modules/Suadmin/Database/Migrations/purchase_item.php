<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_item', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('purchase_bill', 50);
            $table->string('purchase_id', 11);
            $table->string('vendor_name', 255);
            $table->string('item_name', 255);
            $table->string('item_id', 11);
            $table->string('item_hsn', 15);
            $table->string('item_mrp', 15);
            $table->string('item_qty', 15);
            $table->string('purchase_date', 50);
            $table->decimal('item_purchase_price', total: 10, places: 2);
            $table->decimal('item_amount', total: 10, places: 2);
            $table->string('created_at', 120);
            $table->string('updated_at', 120);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_item');
    }
};
