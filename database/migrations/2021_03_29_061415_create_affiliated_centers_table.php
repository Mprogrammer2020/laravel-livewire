<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatedCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliated_centers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cms_page_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('video_thumbnail_image')->nullable();
            $table->string('video_link')->nullable();
            $table->text('step1_content')->nullable();
            $table->text('step2_content')->nullable();
            $table->text('step3_content')->nullable();
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
        Schema::dropIfExists('affiliated_centers');
    }
}
