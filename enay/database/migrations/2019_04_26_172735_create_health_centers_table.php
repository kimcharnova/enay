<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthCentersTable extends Migration
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
            $table->string('purokid');//fk
            $table->foreign('purokid')->references('purokid')->on('purok');
            $table->string('barangayid');//fk
            $table->foreign('barangayid')->references('barangayid')->on('barangay');
            $table->string('cityid');//fk
            $table->foreign('cityid')->references('cityid')->on('city');
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
        Schema::dropIfExists('healthcenter');
    }
}
