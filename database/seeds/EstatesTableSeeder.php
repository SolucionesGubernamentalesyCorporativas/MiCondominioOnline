<?php

use Illuminate\Database\Seeder;

class EstatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estates')->insert(array(
            array(
                'number' => '15',
                'rented' => '1',
                'number_of_parking_lots' => '2',
                'notes' => 'Jardin frontal',
                'type_of_estate_id' => '1',
                'condo_id' => '1'
            ),
            array(
                'number' => '16',
                'rented' => '0',
                'number_of_parking_lots' => '1',
                'notes' => 'cuarto piso',
                'type_of_estate_id' => '2',
                'condo_id' => '2'
            ),
            array(
                'number' => '2',
                'rented' => '1',
                'number_of_parking_lots' => '2',
                'notes' => 'Patio de servicio descubierto',
                'type_of_estate_id' => '3',
                'condo_id' => '3'
            )
        ));
    }
}
