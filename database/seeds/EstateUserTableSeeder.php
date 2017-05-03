<?php

use Illuminate\Database\Seeder;

class EstateUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estate_user')->insert(array(
            array(
                'estate_id' => '1',
                'user_id' => '1'
            ),
            array(
                'estate_id' => '2',
                'user_id' => '2'
            ),
            array(
                'estate_id' => '3',
                'user_id' => '3'
            )
        ));
    }
}
