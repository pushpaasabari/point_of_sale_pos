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
        Schema::create('su_user', function (Blueprint $table) {
            $table->increments('user_sno')->unique();
            $table->string('user_type', 120);
            $table->string('user_name', 120);
            $table->string('user_id', 120);
            $table->string('user_pwd', 120);
            $table->string('user_mobile', 120);
            $table->string('user_email', 120);
            $table->string('user_address', 120);
            $table->string('user_id_proof', 120);
            $table->string('user_id_proof_image', 120);
            $table->string('user_created_on', 50);
            $table->string('user_updated_on', 50);
            $table->integer('user_otp_status');
            $table->integer('user_status');
        });
    }


    public function down()
    {
        Schema::dropIfExists('su_user');
    }
};