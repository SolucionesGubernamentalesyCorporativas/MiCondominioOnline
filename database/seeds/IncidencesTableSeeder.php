<?php

use Illuminate\Database\Seeder;

class IncidencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidences')->insert(array(
            array(
                'description' => 'El habitante de la casa rompio una maceta al dar una vuelta muy cerrada',
                'type_of_incidence_id' => '1',
                'estate_id' => '1'
            ),
            array(
                'description' => 'Se rego con agua no tratada el area verde, causando malos olores',
                'type_of_incidence_id' => '2',
                'estate_id' => '2'
            ),
            array(
                'description' => 'Reporte de vecinos molestos por volumen alto de musica',
                'type_of_incidence_id' => '3',
                'estate_id' => '3'
            )
        ));
    }
}
