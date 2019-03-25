<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purok', function (Blueprint $table) {
            $table->string('purokid')->primary()->default('PUR');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('purok')->insert(
            array('name' => 'samplepurok')
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purok');
        
    }
}
