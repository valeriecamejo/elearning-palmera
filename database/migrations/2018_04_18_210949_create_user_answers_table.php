<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_answers', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('evaluation_id');
      $table->integer('question_id');
      $table->integer('answer_id');
      $table->integer('user_id');
      $table->integer('user_evaluation_id');
      $table->text('description');
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
    Schema::dropIfExists('user_answers');
  }
}
