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
                'content' => 'Se van a reparar las luminarias el dia 20 de Abril de este año, esten prevenidos',
                'user_id' => '1'
            ),
            array(
                'title' => 'Contratación de personas de aseo',
                'content' => 'Se busca persona de limpieza para la casa 23',
                'user_id' => '2'
            ),
            array(
                'title' => 'Venta de garage',
                'content' => 'Fabulosa venta de garage!, precios inigualables!',
                'user_id' => '3'
            )
        ));
    }
}
