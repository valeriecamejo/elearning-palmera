<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('last_name')->nullable();
      $table->string('username')->nullable();
      $table->string('email')->unique();
      $table->integer('dni')->unique();
      $table->integer('role_id');
      $table->integer('brand_id');
      $table->integer('country_id');
      $table->integer('state_id');
      $table->string('phone')->nullable();
      $table->boolean('active');
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('user_type_id');
    Schema::dropIfExists('users');
  }
}
