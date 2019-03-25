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
        DB::unprepared('CREATE TRIGGER before_insert_purok BEFORE INSERT ON purok
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 where prefix=NEW.purokid;
                SET new.purokid = concat(new.purokid, (SELECT num from increment where prefix=new.purokid));
            END');
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
