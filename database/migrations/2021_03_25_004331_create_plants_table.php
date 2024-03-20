<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('price');
            $table->text('description');
            $table->text('feature1');
            $table->text('feature2')->nullable();
            $table->text('feature3')->nullable();
            $table->text('benefit1');
            $table->text('benefit2')->nullable();
            $table->text('benefit3')->nullable();
            $table->text('earn_cash_text1');
            $table->text('earn_cash_text2')->nullable();
            $table->text('earn_cash_text3')->nullable();
            $table->text('what_you_get_text1');
            $table->text('what_you_get_text2')->nullable();
            $table->text('what_you_get_text3')->nullable();
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
        Schema::dropIfExists('plants');
    }
}
