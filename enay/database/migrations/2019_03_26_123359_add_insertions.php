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
            array('prefix'=>'HC'),//healthcenter
            array('prefix'=>'PUR'),//purok
            array('prefix'=>'BAR'),//barangay
            array('prefix'=>'CTY'),//city
            array('prefix'=>'PER'),//personnel
            array('prefix'=>'MOM'),//mother
            array('prefix'=>'PRG'),//pregnancy
            array('prefix'=>'PRE'),//prenatal
            array('prefix'=>'POS'),//portnatal
            array('prefix'=>'CHD'),//child
            array('prefix'=>'DEL'),//delivery
            array('prefix'=>'SVC'),//service
            array('prefix'=>'ACQ'),//service acquired
            array('prefix'=>'REF'),//referral
            array('prefix'=>'CHV')//child visit
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
