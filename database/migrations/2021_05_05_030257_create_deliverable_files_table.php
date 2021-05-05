<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverableFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverable_files', function (Blueprint $table) {
            $table->id('deliverable_file_id');
            $table->unsignedBigInteger('deliverable_id');
            $table->foreign('deliverable_id')->references('deliverable_id')->on('deliverables');
            $table->string('name');
            $table->string('address');
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
        Schema::dropIfExists('deliverable_files');
    }
}
