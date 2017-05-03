<?php

use Illuminate\Database\Seeder;

class CondoUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condo_user')->insert(array(
            array(
                'condo_id' => '1',
                'user_id' => '1'
            ),
            array(
                'condo_id' => '2',
                'user_id' => '2'
            ),
            array(
                'condo_id' => '3',
                'user_id' => '3'
            )
        ));
    }
}
