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
        Schema::create('business_basic', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('business_name', 255);
            $table->string('business_gstin', 15);
            $table->string('business_cin', 15);
            $table->string('business_email', 50);
            $table->string('business_website', 50);
            $table->string('business_mobile', 15);
            $table->string('business_street', 255);
            $table->string('business_landmark', 255);
            $table->string('business_city', 255);
            $table->string('business_pincode', 6);
            $table->string('business_country', 255);
            $table->string('business_currency', 5);
            $table->string('business_profile_picture', 255);
            $table->string('business_prefix_invoice', 255);
            $table->string('business_prefix_estimate', 255);
            $table->string('business_prefix_paymentin', 255);
            $table->string('business_prefix_paymentout', 255);
            $table->string('business_prefix_creditnote', 255);
            $table->string('business_created_at', 120);
            $table->string('business_updated_at', 120);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_basic');
    }
};
