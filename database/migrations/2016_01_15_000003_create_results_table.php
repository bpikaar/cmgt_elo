<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('results'))
        {
            Schema::create('results', function (Blueprint $table)
            {
                $table->increments('id');
                $table->integer('student_id')->unsigned()->index();
                $table->foreign('student_id')->references('id')->on('users');

                $table->integer('exam_id')->unsigned()->index();
                $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');

                $table->string('result');
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
        Schema::dropIfExists('results');
    }
}
