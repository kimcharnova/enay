<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerBarangay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER before_insert_barangay BEFORE INSERT ON barangay
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 where prefix=NEW.barangayid;
                SET new.barangayid = concat(new.barangayid, (SELECT num from increment where prefix=new.barangayid));
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER before_insert_barangay');
    }
}
