<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildvisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childvisit', function (Blueprint $table) {
            $table->string('childvisitid')->primary()->default('CHV');
            $table->date('dateOfVisit');
            $table->tinyinteger('currentAge');
            $table->string('diagnosis');
            $table->string('nextVisit');
            $table->string('childid');//fk
            $table->foreign('childid')->references('childid')->on('child');
            $table->string('remarks');
            $table->string('id');//fk
            $table->foreign('id')->references('id')->on('users');
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
        Schema::dropIfExists('childvisit');
    }
}
