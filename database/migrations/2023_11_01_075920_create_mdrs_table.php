<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mdrs', function (Blueprint $table) {
            $table->id();
            $table->float('ml');
            $table->float('mh');
            $table->float('ts1');
            $table->float('ts2');
            $table->float('tc50');
            $table->float('tc90');
            $table->longText('mdrs_description');
            $table->string('filemdr');
            $table->timestamps();
            $table->integer('rubber_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mdrs');
    }
}
