<?php

use Illuminate\Database\Seeder;

class UnlockedFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unlocked_features')->insert(array(
            array(
                'name' => 'Todas',
                'type_of_membership_id' => '1'
            ),
            array(
                'name' => 'Administrar varios condominios',
                'type_of_membership_id' => '2'
            ),
            array(
                'name' => 'Basicas',
                'type_of_membership_id' => '3'
            )
        ));
    }
}
