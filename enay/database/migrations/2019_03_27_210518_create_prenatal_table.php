<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrenatalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prenatal', function (Blueprint $table) {
            $table->string('prenatalid')->primary()->default('PRE');
            $table->string('pregnancyid');//fk
            $table->foreign('pregnancyid')->references('pregnancyid')->on('pregnancy');
            $table->date('dateOfVisit');
            $table->tinyinteger('trimesterno');
<<<<<<< Updated upstream
            $table->tinyinteger('gestationalage');
=======
<<<<<<< HEAD
            $table->tinyinteger('geslationalage');
=======
            $table->tinyinteger('gestationalage');
>>>>>>> 3766d7c9554f0ef1845365011f8fe70a5f45d9a5
>>>>>>> Stashed changes
            $table->float('weight');
            $table->string('bloopressure');
            $table->string('labresult')->nullable();
            $table->date('nextVisit');
            $table->string('remarks');
<<<<<<< Updated upstream
            $table->string('personnelid');//fk
            $table->foreign('personnelid')->references('id')->on('users');
=======
<<<<<<< HEAD
=======
            $table->string('personnelid');//fk
            $table->foreign('personnelid')->references('id')->on('users');
>>>>>>> 3766d7c9554f0ef1845365011f8fe70a5f45d9a5
>>>>>>> Stashed changes
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER before_insert_prenatal BEFORE INSERT ON prenatal
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.prenatalid;
                SET NEW.prenatalid = concat(NEW.prenatalid, (SELECT num FROM increment WHERE prefix=NEW.prenatalid));
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prenatal');
    }
}
