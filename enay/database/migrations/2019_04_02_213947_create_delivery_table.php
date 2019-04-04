<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->string('deliveryid')->primary()->default('DEL');
            $table->string('attendantType');
            $table->string('birthplace');
            $table->float('birthweight');
            $table->tinyinteger('birthlength');
            $table->string('birthtype');
            $table->string('remarks');
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER before_insert_delivery BEFORE INSERT ON delivery
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.deliveryid;
                SET NEW.deliveryid = concat(NEW.deliveryid, (SELECT num FROM increment WHERE prefix=NEW.deliveryid));
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery');
    }
}
