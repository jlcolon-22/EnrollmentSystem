<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment_colleges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('placeOfBirth');
            $table->string('dateOfBirth');
            $table->string('cellphoneNumber');
            $table->string('permanentAddress');
            $table->string('course');
            $table->string('fatherName');
            $table->string('fatherCellphoneNumber');
            $table->string('motherName');
            $table->string('motherCellphoneNumber');
            $table->string('psa');
            $table->string('goodMoral');
            $table->string('form137');
            $table->string('form138');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('enrollment_colleges');
    }
};
