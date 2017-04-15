<?php

use Illuminate\Database\Seeder;

class VisitorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visitors')->insert(array(
            array(
                'name' => 'Karla Jauregui',
                'date_arrival' => '2017-06-12',
                'vehicle' => '1',
                'user_id' => '1',
                'type_of_visitor_id' => '1'
            ),
            array(
                'name' => 'Alberto Castañeda',
                'date_arrival' => '2017-06-14',
                'vehicle' => '0',
                'user_id' => '2',
                'type_of_visitor_id' => '2'
            ),
            array(
                'name' => 'Carlos Contreras',
                'date_arrival' => '2017-06-13',
                'vehicle' => '1',
                'user_id' => '3',
                'type_of_visitor_id' => '3'
            )
        ));

    }
}
