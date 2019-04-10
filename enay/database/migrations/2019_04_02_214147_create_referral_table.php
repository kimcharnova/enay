<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral', function (Blueprint $table) {
            $table->string('referralid')->primary()->default('REF');
            $table->string('patient');
            $table->string('midwifeDiagnosis');
            $table->string('midwifeAction');
            $table->string('referralCenter');
            $table->date('dateReferred');
            $table->string('referralDiagnosis');
            $table->string('referralAction');
            $table->string('referralInstruction');
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
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER before_insert_referral BEFORE INSERT ON referral
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.referralid;
                SET NEW.referralid = concat(NEW.referralid, (SELECT num FROM increment WHERE prefix=NEW.referralid));
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral');
    }
}
