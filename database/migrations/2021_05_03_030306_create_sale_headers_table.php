<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_headers', function (Blueprint $table) {
            $table->id('sale_header_id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('shop_id')->on('shops');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('status_id')->on('sale_statuses');
            $table->date('sale_date')->useCurrent();
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
        Schema::dropIfExists('sale_headers');
    }
}
