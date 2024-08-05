<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestlapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testlaps', function (Blueprint $table) {
            $table->id();
            $table->float('weights');
            $table->timestamps();
            $table->integer('record_id')->nullable();
            $table->string('other_id')->nullable();
            $table->float('thicknees');
            $table->float('width');
            $table->float('length');
            $table->float('max_force');
            $table->float('max_stress');
            $table->float('modules');
            $table->float('break');
            $table->longText('tensiles_description');
            $table->string('filetensile');
            $table->float('ml');
            $table->float('mh');
            $table->float('ts1');
            $table->float('ts2');
            $table->float('tc50');
            $table->float('tc90');
            $table->longText('mdrs_description');
            $table->string('filemdr');
            $table->float('hts1');
            $table->float('hts2');
            $table->float('hts3');
            $table->string('type');
            $table->longText('hardnesses_description');
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
        Schema::dropIfExists('testlaps');
    }
}
