<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('entrance_fee', 8,2);
            $table->longText('description')->nullable();
            $table->integer('alcohol_price')->default(1);
            $table->boolean('active')->default(true);
            $table->boolean('hot')->default(false);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('country_id')->default(1);
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('clubs');
    }
}
