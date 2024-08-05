<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestlabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testlabs', function (Blueprint $table) {
            $table->id();
            $table->integer('materail_id')->nullable();
            $table->integer('mdrs_id')->nullable();
            $table->integer('tensiles_id')->nullable();
            $table->integer('hardness_id')->nullable();
            $table->integer('rubber_id')->nullable();
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
        Schema::dropIfExists('testlabs');
    }
}
