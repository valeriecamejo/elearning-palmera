<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncentivePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incentive_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('data')->nullable();
            $table->string('type');
            $table->integer('score');
            $table->dateTimeTz('start_date');
            $table->dateTimeTz('end_date')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('who_upload');
            $table->string('who_close');
            $table->dateTimeTz('when_close');
            $table->longText('terms_conditions')->nullable();
            $table->text('roles');
            $table->text('products');
            $table->text('evaluations');
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
        Schema::dropIfExists('incentive_plans');
    }
}
