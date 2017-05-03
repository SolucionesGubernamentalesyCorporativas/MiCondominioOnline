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
                'description' => 'Pariente del residente'
            ),
            array(
                'name' => 'Mensajeria',
                'description' => 'Mensajero de DHL, entra sin vehiculo'
            ),
            array(
                'name' => 'Conocido',
                'description' => 'Amigo del residente'
            )
        ));
    }
}
