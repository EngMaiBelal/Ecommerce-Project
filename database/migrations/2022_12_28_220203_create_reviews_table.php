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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); //no composite
            $table->text('comment')->nullable();
            $table->tinyInteger('rate')->nullable();
            $table->foreignId('product_id')->constrained()
            ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained()
            ->restrictOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('reviews');
    }
};
