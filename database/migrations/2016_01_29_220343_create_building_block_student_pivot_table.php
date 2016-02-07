<?php

use App\Models\Common\Status;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingBlockStudentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('building_block_student'))
        {
            Schema::create('building_block_student', function (Blueprint $table)
            {
                $table->primary(['building_block_id', 'user_id']);

                $table->integer('building_block_id')->unsigned()->index();
                $table->foreign('building_block_id')->references('id')->on('building_blocks')->onDelete('cascade');

                $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                $table->string('status')->default(Status::Open);


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
        Schema::dropIfExists('building_block_student');
    }
}
