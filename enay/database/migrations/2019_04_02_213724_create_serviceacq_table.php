<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceacqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceacq', function (Blueprint $table) {
            $table->string('serviceacquiredid')->primary()->default('ACQ');
            $table->string('serviceid');//fk
            $table->foreign('serviceid')->references('serviceid')->on('service');
            $table->string('reference');
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER before_insert_serviceacq BEFORE INSERT ON serviceacq
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.serviceacquiredid;
                SET NEW.serviceacquiredid = concat(NEW.serviceacquiredid, (SELECT num FROM increment WHERE prefix=NEW.serviceacquiredid));
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviceacq');
    }
}
