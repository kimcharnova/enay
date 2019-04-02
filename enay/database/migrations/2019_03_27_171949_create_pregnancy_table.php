<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregnancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy', function (Blueprint $table) {
            $table->string('pregnancyid')->primary()->default('PRG');
            $table->string('motherid');//fk
            $table->foreign('motherid')->references('motherid')->on('mother');
            $table->string('presentHealthprob');
            $table->string('obstetricHist');
            $table->date('LMP');
            $table->date('EDC');
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER before_insert_pregnancy BEFORE INSERT ON pregnancy
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.pregnancyid;
                SET NEW.pregnancyid = concat(NEW.pregnancyid, (SELECT num FROM increment WHERE prefix=NEW.pregnancyid));
            END');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregnancy');
    }
}
