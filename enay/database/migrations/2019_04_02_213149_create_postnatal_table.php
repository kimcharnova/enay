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
            $table->string('id');//fk
            $table->foreign('id')->references('id')->on('users');
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
