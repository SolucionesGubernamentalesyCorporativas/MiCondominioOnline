<?php

use Illuminate\Database\Seeder;

class TypeOfMembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_memberships')->insert(array(
            array(
                'name' => 'Premium',
                'cost' => '3600.00'
            ),
            array(
                'name' => 'Avanzada',
                'cost' => '2000.00'
            ),
            array(
                'name' => 'Basica',
                'cost' => '1200.00'
            )
        ));
    }
}
