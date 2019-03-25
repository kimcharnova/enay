<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER before_insert_city BEFORE INSERT ON city
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 where prefix=NEW.cityid;
                SET new.cityid = concat(new.cityid, (SELECT num from increment where prefix=new.cityid));
            END');

        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER before_insert_city');
    }
}
