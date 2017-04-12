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
                'number' => 'Jardines de la hacienda #555',
                'rented' => '1',
                'number_of_parking_lots' => '2',
                'notes' => 'Jardin frontal',
                'type_of_estate_id' => '1'
            ),
            array(
                'number' => 'Prolongación zaragoza #122 int.13',
                'rented' => '0',
                'number_of_parking_lots' => '1',
                'notes' => 'Segundo piso',
                'type_of_estate_id' => '2'
            ),
            array(
                'number' => 'Av. Candiles #687, casa 2',
                'rented' => '1',
                'number_of_parking_lots' => '2',
                'notes' => 'Patio de servicio descubierto',
                'type_of_estate_id' => '3'
            )
        ));
    }
}
