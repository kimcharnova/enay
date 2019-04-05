<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildvisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childvisit', function (Blueprint $table) {
            $table->string('childvisitid')->primary()->default('CHV');
            $table->date('dateOfVisit');
            $table->tinyinteger('currentAge');
            $table->string('diagnosis');
            $table->date('nextVisit');
            $table->string('childid');//fk
            $table->foreign('childid')->references('childid')->on('child');
            $table->string('remarks');
            $table->string('personnelid');//fk
            $table->foreign('personnelid')->references('id')->on('users');
            $table->timestamps();
        });

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
        Schema::dropIfExists('childvisit');
    }
}
