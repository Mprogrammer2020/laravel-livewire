<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddNewFieldIntoPlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plants', function ($table) {
            $table->integer('harvest_per_year')->after('what_you_get_text3')->nullable();
            $table->double('revenue')->after('harvest_per_year')->nullable();

            $table->integer('quantity')->after('revenue')->nullable();
            $table->double('sell_price')->after('quantity')->nullable();
            $table->date('start_date')->after('sell_price')->nullable();
            $table->date('end_date')->after('start_date')->nullable();
            $table->double('eth_price')->after('end_date')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plants', function ($table) {
            $table->dropColumn('harvest_per_year');
            $table->dropColumn('revenue');
            $table->dropColumn('quantity');
            $table->dropColumn('sell_price');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });

    }
}