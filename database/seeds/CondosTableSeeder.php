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
                'name' => 'Pablo Peña',
                'direction' => 'Camino Real #23'
            ),
            array(
                'name' => 'Camilo Ortiz',
                'direction' => 'Hortalizas #321'
            ),
            array(
                'name' => 'Maria Velazquez',
                'direction' => 'Cuatro caminos #45 casa 3'
            )
        ));
    }
}
