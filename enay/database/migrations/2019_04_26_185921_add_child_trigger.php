<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChildTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER before_insert_child BEFORE INSERT ON child
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.childid;
                SET NEW.childid = concat(NEW.childid, (SELECT num FROM increment WHERE prefix=NEW.childid));
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `before_insert_child`');
    }
}
