<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds for roles.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      DB::table('roles')->insert(array (
                                        'name'       =>  "Super Admin",
                                        'permission' =>  "Todos",
                                        'level'      =>  1
                                      ));
    }
}