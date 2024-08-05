<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardnesses', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('hardnesses');
    }
}
