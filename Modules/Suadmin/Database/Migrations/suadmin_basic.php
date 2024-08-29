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
        Schema::create('suadmin_basic', function (Blueprint $table) {
            $table->increments('su_id')->unique();
            $table->string('su_name', 120);
            $table->string('su_email', 120);
            $table->string('su_mobile', 120);
            $table->string('su_pwd', 120);
            $table->string('su_created_on', 50);
            $table->string('su_updated_on', 50);
            $table->integer('su_otp_status');
            $table->integer('su_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suadmin_basic');
    }
};
