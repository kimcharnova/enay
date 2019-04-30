<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserInsertions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(
            array(
                'fname' => 'Steph',
                'mname' => 'Cam',
                'lname' => 'Mend',
                'dob' => '1994-04-16',
                'phone' => '325225',
                'healthcenterid' => 'HC1',
                'email' => 'test@test.com',
                'password' => 'password')
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
