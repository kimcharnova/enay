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
            $table->string('id');//fk
            $table->foreign('id')->references('id')->on('users');
            $table->timestamps();
        });
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
