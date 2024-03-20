<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrainBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strain_bases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->string('image')->nullable();
            $table->text('origin')->nullable();
            $table->text('effects_of_use')->nullable();
            $table->text('plant_description')->nullable();
            $table->text('recommended_timings')->nullable();
            $table->text('cbd_to_thc_ratio')->nullable();
            $table->text('popular_strains')->nullable();
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
        Schema::dropIfExists('strain_bases');
    }
}
