<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sprints'))
        {
            Schema::create('sprints', function (Blueprint $table)
            {
                $table->increments('id');

                $table->integer('course_id')->unsigned()->index();
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

                $table->string('name');
                $table->string('description');

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
        Schema::dropIfExists('sprints');
    }
}
