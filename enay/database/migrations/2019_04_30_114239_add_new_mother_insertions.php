<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewMotherInsertions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('mother')->insert(array(
            array('fname' => 'Azman', 'mname' => 'Cam', 'lname' => 'Doza',
                'dob' => '1994-04-16', 'email' => 'azman@gmail.com', 'phone' => '09178949189', 
                'houseno' => '16', 'purokid' => 'PUR1', 'barangayid' => 'BAR1', 'cityid' => 'CTY1',
                'longitude' => 8.25, 'latitude' => 124.25, 'bloodtype' => 'A+', 'height' => '157',
                'edu' => 'College Graduate', 'healthproblems' => NULL),
            array('fname' => 'Marl', 'mname' => 'Cam', 'lname' => 'Doza',
                'dob' => '1994-04-16', 'email' => 'marl@gmail.com', 'phone' => '09178949189', 
                'houseno' => '16', 'purokid' => 'PUR1', 'barangayid' => 'BAR1', 'cityid' => 'CTY1',
                'longitude' => 8.25, 'latitude' => 124.25, 'bloodtype' => 'A+', 'height' => '157',
                'edu' => 'College Graduate', 'healthproblems' => NULL),
            array('fname' => 'Kim', 'mname' => 'Cam', 'lname' => 'Doza',
                'dob' => '1994-04-16', 'email' => 'kim@gmail.com', 'phone' => '09178949189', 
                'houseno' => '16', 'purokid' => 'PUR1', 'barangayid' => 'BAR1', 'cityid' => 'CTY1',
                'longitude' => 8.25, 'latitude' => 124.25, 'bloodtype' => 'A+', 'height' => '157',
                'edu' => 'College Graduate', 'healthproblems' => NULL),
            array('fname' => 'Joe', 'mname' => 'Cam', 'lname' => 'Doza',
                'dob' => '1994-04-16', 'email' => 'joe@gmail.com', 'phone' => '09178949189', 
                'houseno' => '16', 'purokid' => 'PUR1', 'barangayid' => 'BAR1', 'cityid' => 'CTY1',
                'longitude' => 8.25, 'latitude' => 124.25, 'bloodtype' => 'A+', 'height' => '157',
                'edu' => 'College Graduate', 'healthproblems' => NULL))

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
