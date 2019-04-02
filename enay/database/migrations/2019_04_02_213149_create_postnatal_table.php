<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostnatalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postnatal', function (Blueprint $table) {
            $table->string('postnatalid')->primary()->default('POS');
            $table->date('dateOfVisit');
            $table->string('condition');
            $table->string('pregnancyid');//fk
            $table->foreign('pregnancyid')->references('pregnancyid')->on('pregnancy');
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
        Schema::dropIfExists('postnatal');
    }
}
