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
                                        'level'      =>  1,
                                        'permission' =>  '[{"is_active":true,
                                                            "module_id":1,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"is_active":true,
                                                            "module_id":2,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":3,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":4,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":5,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":6,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":7,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":8,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":9,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":10,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":11,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":12,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":13,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":14,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":15,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          },
                                                           {"module_id":16,
                                                            "is_active":true,
                                                            "permissions":
                                                                          {"crear":true,
                                                                           "editar":true,
                                                                           "ver":true,
                                                                           "eliminar":true}
                                                                          }
                                                          ]',
                                      ));
    }
}