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
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_sno')->unique();
            $table->string('customer_name', 120);
            $table->string('customer_mobile', 120);
            $table->string('customer_email', 120);
            $table->string('customer_gstin', 120);
            $table->string('customer_address', 420);
            $table->string('customer_created_on', 50);
            $table->string('customer_updated_on', 50);
            $table->integer('customer_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
};
