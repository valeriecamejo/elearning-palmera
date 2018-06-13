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
                                                 'name'        =>  'Usuarios',
                                                 'path'        =>  '/users',
                                                 'description' =>  '',
                                                 'is_config'   =>  true,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Productos',
                                                 'path'        =>  '/products',
                                                 'description' =>  '',
                                                 'is_config'   =>  false,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Marcas',
                                                 'path'        =>  '/brands',
                                                 'description' =>  '',
                                                 'is_config'   =>  true,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Plan de Incentivos',
                                                 'path'        =>  '/incentive-plans',
                                                 'description' =>  '',
                                                 'is_config'   =>  false,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Ventas',
                                                 'path'        =>  '/sales',
                                                 'description' =>  '',
                                                 'is_config'   =>  false,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'E-Learning',
                                                 'path'        =>  '/e-learnings',
                                                 'description' =>  '',
                                                 'is_config'   =>  false,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Categorias',
                                                 'path'        =>  '/categories',
                                                 'description' =>  '',
                                                 'is_config'   =>  false,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Catalogo',
                                                 'path'        =>  '/catalogs',
                                                 'description' =>  '',
                                                 'is_config'   =>  false,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Noticias',
                                                 'path'        =>  '/news',
                                                 'description' =>  '',
                                                 'is_config'   =>  false,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Inicio',
                                                 'path'        =>  '/home',
                                                 'description' =>  '',
                                                 'is_config'   =>  false,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Evaluaciones',
                                                 'path'        =>  '/evaluations',
                                                 'description' =>  '',
                                                 'is_config'   =>  true,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Roles',
                                                 'path'        =>  '/roles',
                                                 'description' =>  '',
                                                 'is_config'   =>  true,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Pais',
                                                 'path'        =>  '/countries',
                                                 'description' =>  '',
                                                 'is_config'   =>  true,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Estados/Provincias',
                                                 'path'        =>  '/states',
                                                 'description' =>  '',
                                                 'is_config'   =>  true,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Ciudades',
                                                 'path'        =>  '/cities',
                                                 'description' =>  '',
                                                 'is_config'   =>  true,
                                                 'active'      =>  true,
                                                 ),
                                            array(
                                                 'name'        =>  'Tiendas',
                                                 'path'        =>  '/stores',
                                                 'description' =>  '',
                                                 'is_config'   =>  true,
                                                 'active'      =>  true,
                                                 ),
                                           ));
  }
}
