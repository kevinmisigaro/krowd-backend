<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
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
            $table->string('name');
            $table->date('event_date');
            $table->float('entrance_fee', 8,2);
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->integer('alcohol_price')->default(1);
            $table->boolean('active')->default(true);
            $table->string('image')->nullable();
            $table->string('event_video')->nullable();
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
}
