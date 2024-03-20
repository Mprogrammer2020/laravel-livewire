<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddFieldIntoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function ($table) {
            $table->longText('address')->nullable()->after('user_id')->nullable();
            $table->longText('private_key')->after('address')->nullable();
            $table->double('total_amount')->after('private_key')->nullable();
            $table->text('currency')->after('total_amount')->nullable();
            $table->enum('is_completed', [1, 0])->nullable()->default(0);
            $table->longText('order_number')->after('is_completed')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function ($table) {
            $table->dropColumn('address');
            $table->dropColumn('private_key');
            $table->dropColumn('total_amount');
            $table->dropColumn('currency');
            $table->dropColumn('is_completed');
            $table->dropColumn('order_number');

        });
    }
}