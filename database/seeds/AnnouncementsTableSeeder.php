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
                'url_of_content' => '#',
                'estate_id' => '1'
            ),
            array(
                'title' => 'Contratación de personas de aseo',
                'url_of_content' => '#',
                'estate_id' => '2'
            ),
            array(
                'title' => 'Venta de garage',
                'url_of_content' => '#',
                'estate_id' => '3'
            )
        ));
    }
}
