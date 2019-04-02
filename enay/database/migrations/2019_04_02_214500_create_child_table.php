<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child', function (Blueprint $table) {
            $table->string('childid')->primary()->default('CHD');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->date('dob');
            $table->string('pregnancyid');//fk
            $table->foreign('pregnancyid')->references('pregnancyid')->on('pregnancy');
            $table->tinyinteger('childOrder');
            $table->date('dateRegistered');
            $table->string('gender');
            $table->string('deliveryid');//fk
            $table->foreign('deliveryid')->references('deliveryid')->on('delivery');
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER before_insert_child BEFORE INSERT ON child
            FOR EACH ROW
            BEGIN
                UPDATE increment SET num=num+1 WHERE prefix=NEW.childid;
                SET NEW.childid = concat(NEW.childid, (SELECT num FROM increment WHERE prefix=NEW.childid));
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child');
    }
}
