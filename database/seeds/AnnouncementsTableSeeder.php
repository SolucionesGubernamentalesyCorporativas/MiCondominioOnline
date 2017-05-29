<?php

use Illuminate\Database\Seeder;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcements')->insert(array(
            array(
                'title' => 'Reparación de luminarias',
                'description' => 'Se repararan los focos de la entrada el proximo martes',
                'user_id' => '1'
            ),
            array(
                'title' => 'Contratación de personas de aseo',
                'description' => 'Se busca persona del aseo para casa 3',
                'user_id' => '2'
            ),
            array(
                'title' => 'Venta de garage',
                'description' => 'Fabulosos precios!',
                'user_id' => '3'
            )
        ));
    }
}
