<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_lists', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('qty')->nullable();
            $table->text('total_qty')->nullable();
            $table->text('showqty')->nullable();
            $table->text('start_date')->nullable();
            $table->text('category_id')->nullable();
            $table->text('group_id')->nullable();
            $table->text('price')->nullable();
            $table->text('unit_id')->nullable();
            $table->text('expired_date')->nullable();
            $table->text('customer_id')->nullable();
            $table->text('last_remaining')->nullable();
            $table->text('last_remaining_qty')->default(0);
            $table->text('photo')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('medical_lists');
    }
}
