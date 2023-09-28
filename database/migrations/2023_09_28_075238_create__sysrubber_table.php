<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysrubberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_sysrubber', function (Blueprint $table) {
            $table->id();
            $table->integer('rubber_formula_customer_id');
            $table->string('rubber_formula_hardness_s');
            $table->string('rubber_formula_hardness_e');
            $table->date('reservationdate');
            $table->string('name_chemical');
            $table->string('slug');
            $table->longText('rev');
            $table->longText('description');
            $table->enum('status',['Enabled','Disabled'])->default('Enabled');
            $table->integer('chemical_id');
            $table->string('rubber_formula_weight');
            $table->string('user_edit');
            $table->integer('cfg_id');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_sysrubber');
    }
}
