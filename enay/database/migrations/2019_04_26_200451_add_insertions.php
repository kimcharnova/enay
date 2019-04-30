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
            array('name' => 'Iligan')
        );

        DB::table('barangay')->insert(
            array('name' => 'Hinaplanon', 'cityid' => 'CTY1')
        );

        DB::table('purok')->insert(
            array('name' => '9A', 'barangayid' => 'BAR1')
        );

               

        DB::table('healthcenter')->insert(
            array('purokid' => 'PUR1', 'barangayid' => 'BAR1', 'cityid' => 'CTY1')
        );

        DB::table('mother')->insert(
            array('fname' => 'Peepa', 'mname' => 'Cam', 'lname' => 'Doza',
                'dob' => '1994-04-16', 'email' => 'peepadoza@gmail.com', 'phone' => '09178949189', 
                'houseno' => '16', 'purokid' => 'PUR1', 'barangayid' => 'BAR1', 'cityid' => 'CTY1',
                'longitude' => 8.25, 'latitude' => 124.25, 'bloodtype' => 'A+', 'height' => '157',
                'edu' => 'College Graduate', 'healthproblems' => NULL)
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
