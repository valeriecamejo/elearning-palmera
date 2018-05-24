<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('brands')->insert([
        'name'          => 'Palm ERA',
        'navbar_color'  => 'navbar-dark bg-dark',
        'logo'          => 'logo.png',
        'header'        => 'header.png'
      ]);
    }
}
