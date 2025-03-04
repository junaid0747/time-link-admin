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
             // $table->id();
            // $table->string('user_id');
            // $table->string('reference_id');
            // $table->string('order_description')->nullable(true);
            // $table->string('delivered_date')->nullable(true);
            // $table->string('status')->nullable(true);
            // $table->timestamps();


            $table->id();
            $table->integer('business_id');
            $table->string('business_key');
            $table->string('start_time')->nullable(true);
            $table->string('total_time')->nullable(true);
            $table->string('status')->nullable(true);
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
