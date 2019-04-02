<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceacqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceacq', function (Blueprint $table) {
            $table->string('serviceacquiredid')->primary()->default('ACQ');
            $table->string('serviceid');//fk
            $table->foreign('serviceid')->references('serviceid')->on('service');
            $table->string('reference');
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
        Schema::dropIfExists('serviceacq');
    }
}
