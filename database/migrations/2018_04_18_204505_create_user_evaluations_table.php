<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEvaluationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_evaluations', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('evaluation_id');
      $table->integer('user_id');
      $table->float('score');
      $table->boolean('approved');
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
    Schema::dropIfExists('user_evaluations');
  }
}
