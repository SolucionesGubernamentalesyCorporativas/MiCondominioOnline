<?php

use Illuminate\Database\Seeder;

class AssetTableSeeder extends Seeder
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
                'user_id' => '1'
            ),
            array(
                'name' => 'Tumbling',
                'description' => 'Brincolin para el area comun',
                'user_id' => '2'
            ),
            array(
                'name' => 'Hidrolavadora',
                'description' => 'Marca Karcher',
                'user_id' => '3'
            )
        ));
    }
}
