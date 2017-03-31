<?php

use Illuminate\Database\Seeder;

class TypeOfResourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_resources')->insert(array(
            array(
                'name' => 'Herramientas para limpieza de alberca',
                'description' => 'Accesorios para limpiar la alberca'
            ),
            array(
                'name' => 'Herramientas de jardineria',
                'description' => 'Utensilios para el cuidado del jardin'
            ),
            array(
                'name' => 'Transporte para el personal',
                'description' => 'Medios de transporte para el personal de seguridad'
            )
        ));
    }
}
