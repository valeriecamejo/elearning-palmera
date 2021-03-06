<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
    public function up() {
      Schema::create('modules', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('path');
        $table->string('description')->nullable();
        $table->boolean('is_config');
        $table->boolean('active')->default(true);
        $table->string('deactive_description')->nullable();
        $table->integer('user_id_deactive')->nullable();
        $table->timestamps();
      });
    }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
    public function down() {
      Schema::dropIfExists('modules');
    }
}
