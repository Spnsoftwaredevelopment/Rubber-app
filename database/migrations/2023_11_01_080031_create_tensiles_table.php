<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTensilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tensiles', function (Blueprint $table) {
            $table->id();
            $table->float('thicknees');
            $table->float('width');
            $table->float('length');
            $table->float('max_force');
            $table->float('max_stress');
            $table->float('modules');
            $table->float('break');
            $table->longText('tensiles_description');
            $table->string('filetensile');
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
        Schema::dropIfExists('tensiles');
    }
}
