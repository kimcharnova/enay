<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->string('serviceid')->primary()->default('SVC');
            $table->string('description');
            $table->string('dosage');
            $table->string('serviceFor');
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER before_insert_service BEFORE INSERT ON service
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.serviceid;
                SET NEW.serviceid = concat(NEW.serviceid, (SELECT num FROM increment WHERE prefix=NEW.serviceid));
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service');
    }
}
