<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHealthcenterTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPDO()->exec("CREATE TRIGGER before_insert_healthcenter BEFORE INSERT ON healthcenter
            FOR EACH ROW
           BEGIN
            SET @pur := (SELECT purokid FROM purok join barangay on purok.barangayid=barangay.barangayid where purokid=NEW.purokid AND purok.barangayid=new.barangayid AND cityid=new.cityid);
                IF((@pur IS NOT NULL)) THEN
                    UPDATE increment SET num=num+1 where prefix=NEW.healthcenterid;
                    SET new.healthcenterid = concat(new.healthcenterid, (SELECT num from increment where prefix=new.healthcenterid));
                ELSE
                    SET new.healthcenterid = NULL;
                    SIGNAL SQLSTATE '45000' SET Message_Text = 'Location does not exist.';
                END IF;
            END
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `before_insert_healthcenter`');
    }
}
