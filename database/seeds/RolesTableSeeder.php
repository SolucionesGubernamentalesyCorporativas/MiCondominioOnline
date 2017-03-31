<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            array(
                'name' => 'Administrador'
            ),
            array(
                'name' => 'Condomino'
            ),
            array(
                'name' => 'Residente'
            )                        
        ));
    }
}
