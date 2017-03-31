<?php

use Illuminate\Database\Seeder;

class MembershipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memberships')->insert(array(
            array(
                'start_date' => '2017-04-20 11:23:13',
                'end_date' => '2018-04-20 12:00:00'
            ),
            array(
                'start_date' => '2017-05-13 18:31:10',
                'end_date' => '2018-05-13 12:00:00'
            ),
            array(
                'start_date' => '2017-03-18 08:14:22',
                'end_date' => '2018-03-18 12:00:00'
            )
        ));
    }
}
