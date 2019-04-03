<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerPurok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPDO()->exec("CREATE TRIGGER before_insert_purok BEFORE INSERT ON purok
            FOR EACH ROW
            BEGIN
                SET @bar := (SELECT barangayid FROM barangay where barangayid=new.barangayid);
                IF(@bar IS NOT NULL) THEN
                    UPDATE increment SET num=num+1 where prefix=NEW.purokid;
                    SET new.purokid = concat(new.purokid, (SELECT num from increment where prefix=new.purokid));
                ELSE
                    SET new.purokid = NULL;
                    SIGNAL SQLSTATE '45000' SET Message_Text = 'Purok and Barangay entered are incompatible.';
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
        DB::unprepared('DROP TRIGGER before_insert_purok');
    }
}
