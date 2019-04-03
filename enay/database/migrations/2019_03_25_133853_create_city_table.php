<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city', function (Blueprint $table) {
            $table->string('cityid')->primary()->default('CTY');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('purok', function (Blueprint $table) {
            $table->foreign('barangayid')->references('barangayid')->on('barangay');
        });

        Schema::table('barangay', function (Blueprint $table) {
            $table->foreign('cityid')->references('cityid')->on('city');
        });           

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city');
    }
}
