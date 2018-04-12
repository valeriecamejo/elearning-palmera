<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ModulesTableSeeder extends Seeder
{
  /**
  * Run the database seeds for modules.
  *
  * @return void
  */
  public function run() {

    $faker = Faker::create();

    DB::table('modules')->insert(array(
                                            array(
                                                 'name'       =>  'Usuarios',
                                                 'route_name' =>  '/users'
                                                 ),
                                            array(
                                                 'name'       =>  'Producto',
                                                 'route_name' =>  '/products'
                                                 ),
                                            array(
                                                 'name'       =>  'Marca',
                                                 'route_name' =>  '/brands'
                                                 ),
                                            array(
                                                 'name'       =>  'Ventas',
                                                 'route_name' =>  '/sales'
                                                 ),
                                            array(
                                                 'name'       =>  'Foros',
                                                 'route_name' =>  '/forums'
                                                 ),
                                            array(
                                                 'name'       =>  'FAQ',
                                                 'route_name' =>  '/faq'
                                                 ),
                                            array(
                                                 'name'       =>  'E-Learning',
                                                 'route_name' =>  '/e-learning'
                                                 ),
                                           ));
  }
}
