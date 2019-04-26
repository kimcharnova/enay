<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrenatalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prenatal', function (Blueprint $table) {
            $table->string('prenatalid')->primary()->default('PRE');
            $table->string('pregnancyid');//fk
            $table->foreign('pregnancyid')->references('pregnancyid')->on('pregnancy');
            $table->date('dateOfVisit');
            $table->tinyinteger('trimesterno');
            $table->integer('gestationalage');
            $table->float('weight');
            $table->string('bloodpressure');
            $table->string('labresult')->nullable();
            $table->date('nextVisit');
            $table->string('remarks')->nullable();
            $table->string('personnelid');//fk
            $table->foreign('personnelid')->references('id')->on('users');
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
        Schema::dropIfExists('prenatal');
    }
}
