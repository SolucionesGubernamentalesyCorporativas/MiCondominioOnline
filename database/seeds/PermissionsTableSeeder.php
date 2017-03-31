<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('permissions')->insert(array(
            array(
                'name' => 'Todos',
                'role_id' => '1'
            ),
            array(
                'name' => 'Crear, editar, borrar',
                'role_id' => '2'
            ),
            array(
                'name' => 'Ninguno',
                'role_id' => '3'
            )
        ))
    }
}
