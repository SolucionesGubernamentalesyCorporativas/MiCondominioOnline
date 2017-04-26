<?php

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assets')->insert(array(
            array(
                'name' => 'Asador',
                'description' => 'Asador marca Coleman',
                'estate_id' => '1'
            ),
            array(
                'name' => 'Tumbling',
                'description' => 'Brincolin para el area comun',
                'estate_id' => '2'
            ),
            array(
                'name' => 'Hidrolavadora',
                'description' => 'Marca Karcher',
                'estate_id' => '3'
            )
        ));
    }
}
