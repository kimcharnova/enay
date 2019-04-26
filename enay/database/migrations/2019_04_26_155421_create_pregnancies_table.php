<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregnanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy', function (Blueprint $table) {
            $table->string('pregnancyid')->primary()->default('PRG');
            $table->string('motherid');//fk
            $table->foreign('motherid')->references('motherid')->on('mother');
            $table->string('presentHealthprob');
            $table->string('obstetricHist');
            $table->date('LMP');
            $table->date('EDC');
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
        Schema::dropIfExists('pregnancy');
    }
}
