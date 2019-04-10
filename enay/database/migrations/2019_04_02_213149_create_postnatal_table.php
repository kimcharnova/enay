<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostnatalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postnatal', function (Blueprint $table) {
            $table->string('postnatalid')->primary()->default('POS');
            $table->date('dateOfVisit');
            $table->string('condition');
            $table->string('pregnancyid');//fk
            $table->foreign('pregnancyid')->references('pregnancyid')->on('pregnancy');
            $table->string('remarks');
<<<<<<< Updated upstream
            $table->string('personnelid');//fk
            $table->foreign('personnelid')->references('id')->on('users');
=======
<<<<<<< HEAD
            $table->string('id');//fk
            $table->foreign('id')->references('id')->on('users');
=======
            $table->string('personnelid');//fk
            $table->foreign('personnelid')->references('id')->on('users');
>>>>>>> 3766d7c9554f0ef1845365011f8fe70a5f45d9a5
>>>>>>> Stashed changes
            $table->date('nextVisit');
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER before_insert_postnatal BEFORE INSERT ON postnatal
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.postnatalid;
                SET NEW.postnatalid = concat(NEW.postnatalid, (SELECT num FROM increment WHERE prefix=NEW.postnatalid));
            END');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postnatal');
    }
}
