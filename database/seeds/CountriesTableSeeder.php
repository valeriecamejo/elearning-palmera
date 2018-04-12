<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('countries')->insert([
      'name'      => 'Venezuela',
      'nickname'  => 'VE'
    ]);
    DB::table('countries')->insert([
      'name'      => 'Colombia',
      'nickname'  => 'CO'
    ]);
    DB::table('countries')->insert([
      'name'      => 'Portugal',
      'nickname'  => 'PT'
    ]);
  }
}
