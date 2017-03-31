<?php

use Illuminate\Database\Seeder;

class TypeOfVisitorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_visitors')->insert(array(
            array(
                'name' => 'Familiar',
                'description' => 'Pariente del residente',
                'visitor_id' => '1'
            ),
            array(
                'name' => 'Mensajeria',
                'description' => 'Mensajero de DHL, entra sin vehiculo',
                'visitor_id' => '2'
            ),
            array(
                'name' => 'Conocido',
                'description' => 'Amigo del residente',
                'visitor_id' => '3'
            )
        ));
    }
}
