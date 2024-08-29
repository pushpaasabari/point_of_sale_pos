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
        Schema::create('vendor', function (Blueprint $table) {
            $table->increments('vendor_sno')->unique();
            $table->string('vendor_name', 120);
            $table->string('vendor_mobile', 120);
            $table->string('vendor_email', 120);
            $table->string('vendor_gstin', 120);
            $table->string('vendor_address', 420);
            $table->string('vendor_created_on', 50);
            $table->string('vendor_updated_on', 50);
            $table->integer('vendor_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor');
    }
};
