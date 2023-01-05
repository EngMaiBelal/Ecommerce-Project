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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code')->unique();
            $table->timestamp('delivered_date')->nullable();
            $table->boolean('status')
            ->comment('1 => delivered, 0 => undelivered')
            ->default('1');
            $table->decimal('total_price',10,2);
            $table->decimal('final_price',10,2);
            $table->foreignId('payment_id')->constrained()
            ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('coupon_id')->constrained()
            ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('address_id')->constrained()
            ->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
