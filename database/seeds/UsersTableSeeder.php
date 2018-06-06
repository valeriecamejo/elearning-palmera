<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table('users')->insert([
        'name'        => 'PalmEra',
        'last_name'   => 'SuperAdmin',
        'username'    => 'Super Admin',
        'email'       => 'palmera@palmera.marketing',
        'dni'         => '00000000',
        'role_id'     => '1',
        'brand_id'    => '1',
        'country_id'  => '1',
        'state_id'    => '1',
        'active'      =>  1,
        'password'    => Hash::make("zxcvbnm")
      ]);
    }
}
