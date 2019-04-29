<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mother', function (Blueprint $table) {
            $table->string('motherid')->primary()->default('MOM');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->date('dob');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('houseno');
            $table->string('purokid');//fk
            $table->foreign('purokid')->references('purokid')->on('purok');
            $table->string('barangayid');//fk
            $table->foreign('barangayid')->references('barangayid')->on('barangay');
            $table->string('cityid');//fk
            $table->foreign('cityid')->references('cityid')->on('city');
            $table->float('longitude');
            $table->float('latitude');
            $table->string('bloodtype');
            $table->integer('height');
            $table->string('edu');
            $table->string('healthproblems')->nullable();
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
        Schema::dropIfExists('mother');
    }
}
