<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverables', function (Blueprint $table) {
            $table->id('deliverable_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('activity_id')->on('activities');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('status_id')->on('deliverable_statuses');
            $table->date('deliverable_date')->useCurrent();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('deliverables');
    }
}
