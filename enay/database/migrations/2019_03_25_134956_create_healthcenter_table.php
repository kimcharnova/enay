<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthcenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthcenter', function (Blueprint $table) {
            $table->string('healthcenterid')->primary()->default('HC');
            $table->string('purokid');
            $table->string('barangayid');
            $table->string('cityid');
            $table->timestamps();
        });

        Schema::table('healthcenter', function (Blueprint $table) {
            $table->foreign('purokid')->references('purokid')->on('purok');
            $table->foreign('barangayid')->references('barangayid')->on('barangay');
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
        Schema::dropIfExists('healthcenter');
    }
}
