<?php

use Illuminate\Database\Seeder;

class CondosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condos')->insert(array(
            array(
                'name' => 'Mision Mariana',
                'address' => 'Camino Real #23'
            ),
            array(
                'name' => 'Los Sauces',
                'address' => 'Hortalizas #321'
            ),
            array(
                'name' => 'El Roble',
                'address' => 'Cuatro caminos #45'
            )
        ));
    }
}
