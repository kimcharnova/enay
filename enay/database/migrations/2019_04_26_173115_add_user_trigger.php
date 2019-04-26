<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //personnelid changed to id
        DB::connection()->getPDO()->exec("CREATE TRIGGER before_register BEFORE INSERT ON users
            FOR EACH ROW
            BEGIN

            SET @hc := (SELECT healthcenterid FROM healthcenter WHERE healthcenterid=NEW.healthcenterid);
            IF (@hc IS NOT NULL) THEN
                UPDATE increment SET num=num+1 where prefix=NEW.id;
                SET new.id = concat(new.id, (SELECT num from increment where prefix=new.id));
            ELSE
                SET new.id = NULL;
                SIGNAL SQLSTATE '45000' SET Message_Text = 'Health Center does not exist.';
            END IF;
            END");
            
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
