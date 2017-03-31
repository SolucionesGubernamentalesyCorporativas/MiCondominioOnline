<?php

use Illuminate\Database\Seeder;

class TypeOfEstatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_estates')->insert(array(
            array(
                'name' => 'Casa',
                'description' => 'Casa de dos pisos'
            ),
            array(
                'name' => 'Departamento',
                'description' => 'Departamento con dos recamaras'
            ),
            array(
                'name' => 'Duplex',
                'description' => 'Parte superior'
            )
        ));
    }
}
