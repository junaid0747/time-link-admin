<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->nullable(true);
            $table->string('business_slogen')->nullable(true);
            $table->string('business_phone')->nullable(true);
            $table->string('business_category')->nullable(true);
            $table->string('business_description')->nullable(true);
            $table->string('business_price')->nullable(true);
            $table->string('business_price_ranage')->nullable(true);
            $table->string('business_price_description')->nullable(true);
            $table->string('business_location')->nullable(true);
            $table->string('social_media_links')->nullable(true);
            $table->string('website_url')->nullable(true);
            $table->string('business_logo')->nullable(true);
            $table->string('business_cover')->nullable(true);
            $table->string('payment_plan')->nullable(true);
            $table->integer('user_id')->default(0);
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
        Schema::dropIfExists('business');
    }
}
