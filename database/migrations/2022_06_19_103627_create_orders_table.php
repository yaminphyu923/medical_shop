<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('voucher')->nullable();
            $table->text('medical_list_id')->nullable();
            $table->text('price')->nullable();
            $table->text('qty')->nullable();
            $table->text('total_amount')->nullable();
            $table->text('customer_id')->nullable();
            $table->text('debt_money')->nullable();
            $table->text('debt')->nullable();
            $table->text('pay_money')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
