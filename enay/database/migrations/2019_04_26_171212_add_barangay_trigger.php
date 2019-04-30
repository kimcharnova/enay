<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBarangayTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPDO()->exec("
            CREATE TRIGGER before_insert_barangay BEFORE INSERT ON barangay
            FOR EACH ROW
            BEGIN
                SET @cty := (SELECT cityid FROM city WHERE cityid = new.cityid);
                IF(@cty IS NOT NULL) THEN
                    UPDATE increment SET num=num+1 where prefix=NEW.barangayid;
                    SET new.barangayid = concat(new.barangayid, (SELECT num from increment where prefix=new.barangayid)); 
                ELSE
                    SET new.barangayid = NULL;
                    signal sqlstate '45000' set message_text = 'City does not exist.';
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
        DB::unprepared('DROP TRIGGER `before_insert_barangay`');
    }
}
