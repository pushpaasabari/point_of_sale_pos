<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('item_sno')->unique();
            $table->string('item_name', 120);
            $table->integer('item_hsn');
            $table->string('item_category', 120);
            $table->integer('item_code');
            $table->string('item_base_unit', 120);
            $table->string('item_desc', 255);
            $table->string('item_secondary_unit', 120);
            $table->integer('item_tax');
            $table->integer('item_stock');
            $table->string('item_purchase_price', 120);
            $table->integer('item_purchase_tax');
            $table->integer('item_mrp');
            $table->string('item_sale_price', 120);
            $table->integer('item_sale_tax');
            $table->string('item_image', 120);
            $table->string('item_created_on', 50);
            $table->string('item_updated_on', 50);
            $table->integer('item_status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item');
    }
};
