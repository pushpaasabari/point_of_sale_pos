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
        Schema::create('su_otp', function (Blueprint $table) {
            $table->increments('su_id')->unique();
            $table->string('su_name', 120);
            $table->string('su_email', 120);
            $table->string('su_otp', 120);
            $table->string('su_created_at', 50);
            $table->string('su_expired_at', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
