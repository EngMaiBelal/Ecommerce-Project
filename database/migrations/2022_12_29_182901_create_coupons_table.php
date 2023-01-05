<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
           
            $table->id();
            $table->integer('max_usage_number');
            $table->smallInteger('max_usage_number_per_user');
            $table->tinyInteger('discount');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('code')->unique();
            $table->boolean('status')->comment('1 => active, 0 => not active')->default('1');
            $table->integer('max_discount_value');
            $table->integer('min_order_value');
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
        Schema::dropIfExists('coupons');
    }
};
