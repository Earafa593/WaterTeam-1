<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountyRiverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('county_river', function (Blueprint $table) {
            $table->primary(['county_id', 'river_id']);
            $table->bigInteger('county_id')->unsigned();
            $table->bigInteger('river_id')->unsigned();
            $table->timestamps();

            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('river_id')->references('id')->on('rivers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('county_river');
    }
}
