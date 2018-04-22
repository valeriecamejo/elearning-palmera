<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('categories')->insert([
      'name'         => 'Smartphone',
      'description'  => 'Smartphone'
    ]);
    DB::table('categories')->insert([
      'name'         => 'Tableta',
      'description'  => 'Tablet'
    ]);
    DB::table('categories')->insert([
      'name'         => 'Televisores',
      'description'  => 'TV'
    ]);
  }
}
