<?php

use Illuminate\Database\Seeder;

class CondoEstateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condo_estate')->insert(array(
            array(
                'condo_id' => '1',
                'estate_id'=> '1'
            ),
            array(
                'condo_id' => '2',
                'estate_id'=> '2'
            ),
            array(
                'condo_id' => '3',
                'estate_id'=> '3'
            )
        ));
    }
}
