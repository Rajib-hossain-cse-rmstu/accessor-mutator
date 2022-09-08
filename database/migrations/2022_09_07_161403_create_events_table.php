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
            // $table->string('user_id');
            $table->string('details');
            $table->string('creator_id');
            $table->timeTz('starting_time');
            $table->timeTz('ending_time');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->enum('status', ['active','inactive']);
            $table->timestampsTz();
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
