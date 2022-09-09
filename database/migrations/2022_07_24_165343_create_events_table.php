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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->string('venue');
            $table->decimal('admission');
            $table->integer('spaces_left');
            $table->string('image');
            $table->string('managed_by');
            $table->tinyInteger('is_eventbrite')->default('0');
            $table->string('eventbrite_link')->nullable();
            $table->tinyInteger('approved')->default('0');
            $table->tinyInteger('happened')->default('0');
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
        Schema::dropIfExists('events');
    }
};
