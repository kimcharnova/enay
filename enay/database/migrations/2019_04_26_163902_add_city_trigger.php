<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPDO()->exec("CREATE TRIGGER before_insert_city BEFORE INSERT ON city
            FOR EACH ROW
            BEGIN
                SET @city := (SELECT name FROM city WHERE name=NEW.name);
                IF(@city IS NULL) THEN
                    UPDATE increment SET num=num+1 where prefix=NEW.cityid;
                    SET new.cityid = concat(new.cityid, (SELECT num from increment where prefix=new.cityid));
                ELSE
                    SET new.cityid = NULL;
                    signal sqlstate '45000' set message_text = 'City already exists.';
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
        DB::unprepared('DROP TRIGGER `before_insert_city`');
    }
}
