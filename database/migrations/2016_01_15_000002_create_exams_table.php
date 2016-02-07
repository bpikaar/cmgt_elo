<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('exams')) {
            Schema::create('exams', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('sprint_id')->unsigned()->index();
                $table->foreign('sprint_id')->references('id')->on('sprints')->onDelete('cascade');

                $table->string('description'); // Kan ondertitel zijn
                $table->text('criteria');
                //$table->string('result'); // Cijfer, waarde van de beoordeling
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
        Schema::dropIfExists('exams');
    }
}
