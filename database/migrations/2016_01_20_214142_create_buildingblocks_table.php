<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingblocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('building_blocks'))
        {
            Schema::create('building_blocks', function (Blueprint $table)
            {
//              curators
//              challenges
//              sources
                $table->increments('id');
                $table->string('name');
                $table->text('slogan');
                $table->text('description');
                $table->text('challenges');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_blocks');
    }
}
