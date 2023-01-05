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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street',255);
            $table->string('building');
            $table->string('floor');
            $table->string('flat');
            $table->string('notes',255);
            $table->enum('type',['HOME','WORK']);
            $table->foreignId('user_id')->constrained()
            ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('region_id')->constrained()
            ->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('addresses');
    }
};
