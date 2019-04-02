<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child', function (Blueprint $table) {
            $table->string('childid')->primary()->default('CHD');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->date('dob');
            $table->string('pregnancyid');//fk
            $table->foreign('pregnancyid')->references('pregnancyid')->on('pregnancy');
            $table->tinyinteger('childOrder');
            $table->date('dateRegistered');
            $table->string('gender');
            $table->string('deliveryid');//fk
            $table->foreign('deliveryid')->references('deliveryid')->on('delivery');
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
        Schema::dropIfExists('child');
    }
}
