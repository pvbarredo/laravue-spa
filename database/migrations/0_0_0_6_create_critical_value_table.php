<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriticalValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('critical_value', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('min_value');
            $table->integer('max_value');
            $table->enum('condition', array(
                'Exact',
                'Range',
                'Above',
                'Below'
            ));
            $table->string('description');
            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')->references('id')->on('property');
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
        Schema::dropIfExists('critical_value');
    }
}
