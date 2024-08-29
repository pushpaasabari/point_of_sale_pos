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
        Schema::create('purchase', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('vendor_id', 11);
            $table->string('vendor_name', 255);
            $table->string('user_name', 255);
            $table->string('vendor_mobile', 15);
            $table->string('vendor_gstin', 15);
            $table->string('purchase_bill', 50);
            $table->string('purchase_date', 50);
            $table->decimal('total_amount', total: 10, places: 2);
            $table->string('purchase_created_at', 120);
            $table->string('purchase_updated_at', 120);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
    }
};
