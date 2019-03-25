<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncrementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('increment', function (Blueprint $table) {
            $table->string('prefix')->primary();
            $table->integer('num')->default('0');
            $table->timestamps();
        });

        DB::table('increment')->insert(
            array('prefix'=>'HC'),
            array('prefix'=>'PUR'),
            array('prefix'=>'BAR'),
            array('prefix'=>'CTY')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('increment');
    }
}
