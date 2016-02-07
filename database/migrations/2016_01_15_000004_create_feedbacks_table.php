<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('feedbacks'))
        {
            Schema::create('feedbacks', function (Blueprint $table)
            {
                $table->increments('id');

                $table->integer('result_id')->unsigned()->index();
                $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');

                $table->integer('student_id')->unsigned()->index();
                $table->foreign('student_id')->references('id')->on('users');

                $table->string('content');
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
        Schema::dropIfExists('feedbacks');
    }
}
