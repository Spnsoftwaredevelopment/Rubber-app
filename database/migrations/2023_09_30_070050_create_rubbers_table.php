<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;




class CreateRubbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubbers', function (Blueprint $table) {
            $table->id();
            $table->string('name_formula')->unique();
            $table->string('customer_id');
            $table->string('product_id');
            $table->integer('hardness_s');
            $table->integer('hardness_e');
            $table->dateTime('start_date')->nullable();
            $table->enum('ref', ['000'])->default('000');
            $table->string('rubber_oldcode')->nullable();
            $table->longText('description');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('approve_by')->nullable();
            $table->integer('testlab_id')->nullable();
            $table->timestamps();
            $table->enum('save_data',['confirm','no'])->default('no');
            $table->enum('status',['Enabled','Disabled'])->default('Disabled');
            $table->enum('inspection', ['Approve', 'Disapproved'])->default('Disapproved');
            $table->enum('isDelete',['0','1'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rubbers');

    }
}
