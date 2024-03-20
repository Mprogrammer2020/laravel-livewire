<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionStepToCmsUserDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_user_dashboards', function (Blueprint $table) {
            $table->longText("description_step_1")->nullable();
            $table->longText("description_step_2")->nullable();
            $table->longText("description_step_3")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_user_dashboards', function (Blueprint $table) {
            //
        });
    }
}
