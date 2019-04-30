<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMotherTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPDO()->exec("CREATE TRIGGER before_insert_mom BEFORE INSERT on MOTHER
            FOR EACH ROW
            BEGIN
                SET @pur := (SELECT purokid FROM purok JOIN barangay on purok.barangayid = barangay.barangayid WHERE purok.barangayid = NEW.barangayid and barangay.cityid = NEW.cityid);
                IF  (@pur IS NOT NULL) THEN
                    UPDATE increment SET num=num+1 WHERE prefix=new.motherid;
                    SET new.motherid = concat(new.motherid, (SELECT num FROM increment where prefix=new.motherid));
                ELSE
                    SET new.motherid = NULL;
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
        DB::unprepared('DROP TRIGGER `before_insert_mom`');
    }
}
