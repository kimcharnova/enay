<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER before_register BEFORE INSERT ON users
            FOR EACH ROW
            BEGIN

            SET @hc := (SELECT healthcenterid FROM healthcenter WHERE healthcenterid=NEW.healthcenterid);
            IF(@hc IS NOT NULL) THEN
                UPDATE increment SET num=num+1 where prefix=NEW.personnelid;
                SET new.personnelid = concat(new.personnelid, (SELECT num from increment where prefix=new.personnelid));
            END IF;
            END');
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `before_register`');
    }
}
