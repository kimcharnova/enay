<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER before_insert_user BEFORE INSERT ON users
            FOR EACH ROW

            SET @hc := (SELECT healthcenterid FROM healthcenter WHERE healthcenterid=NEW.healthcenterid);
            IF(hc!=null) THEN
            BEGIN
                UPDATE increment SET num=num+1 where prefix=NEW.personnelid;
                SET new.personnelid = concat(new.personnelid, (SELECT num from increment where prefix=new.personnelid));
            END;
            END IF;');
            
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
