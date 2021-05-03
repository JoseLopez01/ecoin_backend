<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_schedules', function (Blueprint $table) {
            $table->primary(['course_id', 'week_day_id']);
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->unsignedBigInteger('week_day_id');
            $table->foreign('week_day_id')->references('week_day_id')->on('week_days');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('course_schedules');
    }
}
