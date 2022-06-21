<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->integer('id');
            $table->string('gender');
            $table->string('address');
            $table->string('dob');
            $table->string('phone_number')->unique();
            $table->string('your_photo');
            $table->string('citizenship_front');
            $table->string('citizenship_back');
            $table->string('school_name');
            $table->string('marksheet_photo');
            $table->string('interest');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
