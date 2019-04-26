<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChildvisitTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER before_insert_childvisit BEFORE INSERT ON childvisit
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.childvisitid;
                SET NEW.childvisitid = concat(NEW.childvisitid, (SELECT num FROM increment WHERE prefix=NEW.childvisitid));
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `before_insert_childvisit`');
    }
}
