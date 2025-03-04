<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('company_name')->nullable(true);
            $table->integer('salary')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('industry')->nullable(true);
            $table->string('futher_information')->nullable(true);
            $table->string('location')->nullable(true);
            $table->string('image')->nullable(true);
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
        Schema::dropIfExists('jobs');
    }
}
