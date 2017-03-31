<?php

use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert(array(
            array(
                'capacity' => '15',
                'fee' => '300.00',
                'type_of_resource_id' => '1',
                'user_id' => '1'
            ),
            array(
                'capacity' => '25',
                'fee' => '500.00',
                'type_of_resource_id' => '2',
                'user_id' => '2'
            ),
            array(
                'capacity' => '35',
                'fee' => '145.00',
                'type_of_resource_id' => '3',
                'user_id' => '3'
            )
        ));
    }
}
