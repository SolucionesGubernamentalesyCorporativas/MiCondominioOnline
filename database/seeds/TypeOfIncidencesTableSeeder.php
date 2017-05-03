<?php

use Illuminate\Database\Seeder;

class TypeOfIncidencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_incidences')->insert(array(
            array(
                'name' => 'Accidente automovilistico',
                'description' => 'Choque de autos dentro del fraccionamiento'
            ),
            array(
                'name' => 'Maltrato de areas verdes',
                'description' => 'Cualquier acción que pueda dañar a los jardines del fraccionamiento'
            ),
            array(
                'name' => 'Problemas vecinales',
                'description' => 'Conflictos entre los vecinos dentro del fraccionamiento'
            )
        ));
    }
}
