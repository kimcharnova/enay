<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuroksTable extends Migration
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
            $table->string('barangayid');//fk
            $table->foreign('barangayid')->references('barangayid')->on('barangay');
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
        Schema::dropIfExists('purok');
        
    }
}
