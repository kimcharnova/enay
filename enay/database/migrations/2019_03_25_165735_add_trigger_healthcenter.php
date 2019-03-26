<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerHealthcenter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER before_insert_healthcenter BEFORE INSERT ON healthcenter
            FOR EACH ROW
           BEGIN

            SET @pur := (SELECT purokid FROM purok where purokid=NEW.purokid);
            SET @bar := (SELECT barangayid FROM barangay where barangayid=NEW.barangayid);
            SET @cty := (SELECT cityid FROM city where cityid=NEW.cityid);
            IF((@pur IS NOT NULL) AND (@bar IS NOT NULL) AND (@cty IS NOT NULL)) THEN
                UPDATE increment SET num=num+1 where prefix=NEW.healthcenterid;
                SET new.healthcenterid = concat(new.healthcenterid, (SELECT num from increment where prefix=new.healthcenterid));
            END IF;
            END
            ');


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
