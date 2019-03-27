<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInsertions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('increment')->insert(array(
            array('prefix'=>'HC'),
            array('prefix'=>'PUR'),
            array('prefix'=>'BAR'),
            array('prefix'=>'CTY'),
            array('prefix'=>'PER'),
            array('prefix'=>'MOM')
        ));

        DB::table('city')->insert(
            array('name' => 'samplecity')
        );

        DB::table('barangay')->insert(
            array('name' => 'samplebarangay', 'cityid' => 'CTY1')
        );

        DB::table('purok')->insert(
            array('name' => 'samplepurok', 'barangayid' => 'BAR1')
        );

               

        DB::table('healthcenter')->insert(
            array('purokid' => 'PUR1', 'barangayid' => 'BAR1', 'cityid' => 'CTY1')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
