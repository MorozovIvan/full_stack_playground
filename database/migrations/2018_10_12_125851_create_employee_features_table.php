<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_features', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('employee_id')->unsigned();
            $table->integer('feature_id')->unsigned();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('feature_id')->references('id')->on('features');

            $table->integer('value');

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
        Schema::dropIfExists('employee_features');
    }
}
