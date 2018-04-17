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
        'name'        => 'Solsiret',
        'last_name'   => 'Vasquez',
        'username'    => 'Super Admin',
        'email'       => 'solsiret@palmera.marketing',
        'dni'         => '22904405',
        'role_id'     => '1',
        'brand_id'    => '1',
        'country_id'  => '1',
        'active'      =>  1,
        'password'    => Hash::make("zxcvbnm")
      ]);
    }
}
