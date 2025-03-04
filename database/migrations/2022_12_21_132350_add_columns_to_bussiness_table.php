<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBussinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business', function (Blueprint $table) {
            $table->string('address')->after('business_phone');
            $table->smallInteger('ASIC_approved')->after('business_category');;
            $table->smallInteger('ACN_approved')->after('ASIC_approved');;
            $table->smallInteger('ABN_approved')->after('ACN_approved');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('ASIC_approved');
            $table->dropColumn('ACN_approved');
            $table->dropColumn('ABN_approved');
        });
    }
}
