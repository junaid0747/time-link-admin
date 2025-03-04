<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy', function (Blueprint $table) {
            $table->id();
            $table->string('posted_by')->nullable(true);
            $table->string('job_title')->nullable(true);
            $table->string('business_name')->nullable(true);
            $table->string('job_description')->nullable(true);
            $table->string('salary_type')->nullable(true);
            $table->string('minimum_salary')->nullable(true);
            $table->string('maximum_salary')->nullable(true);
            $table->string('receive_application_by_email')->nullable(true);
            $table->string('work_location')->nullable(true);
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0);
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
        Schema::dropIfExists('vacancy');
    }
}
