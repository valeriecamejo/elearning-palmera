<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('states')->insert([
      'name'       => 'Caracas',
      'country_id' => '1',
      'active'     => true
      ]);
    }
}
