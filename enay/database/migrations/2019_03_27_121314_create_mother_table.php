<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotherTable extends Migration
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
            $table->string('email');
            $table->string('phone');
            $table->string('houseno');
            $table->string('purokid');//fk
            $table->foreign('purokid')->references('purokid')->on('purok');
            $table->string('barangayid');//fk
            $table->foreign('barangayid')->references('barangayid')->on('barangay');
            $table->string('cityid');//fk
            $table->foreign('cityid')->references('cityid')->on('city');
<<<<<<< Updated upstream
            $table->float('longitude');
            $table->float('latitude');
=======
<<<<<<< HEAD
            $table->float('long');
            $table->float('lat');
=======
            $table->float('longitude');
            $table->float('latitude');
>>>>>>> 3766d7c9554f0ef1845365011f8fe70a5f45d9a5
>>>>>>> Stashed changes
            $table->string('bloodtype');
            $table->tinyinteger('height');
            $table->string('edu');
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
