<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->text('order_id')->nullable();
            $table->text('medical_list_id')->nullable();
            $table->text('qty')->nullable();
            $table->text('price')->nullable();
            $table->text('total')->nullable();
            $table->text('customer_id')->nullable();
            $table->text('note')->nullable();
            $table->text('note_finish')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
