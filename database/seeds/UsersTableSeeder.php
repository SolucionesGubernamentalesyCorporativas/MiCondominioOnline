<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'Alejandro',
                'lastname' => 'Torres',
                'email' => 'alex910121@outlook.com',
                'phone' => '4424633117',
                'password' => bcrypt('password'),
                'membership_id' => '1',
                'role_id' => '1'
            ),
            array(
                'name' => 'Gabriel ',
                'lastname' => 'Reyes',
                'email' => 'gabo@reyes.com',
                'phone' => '123123123',
                'password' => bcrypt('password'),
                'membership_id' => '2',
                'role_id' => '2'
            ),
            array(
                'name' => 'Hugo',
                'lastname' => 'Rivas',
                'email' => 'hugo@rivas.com',
                'phone' => '321321321',
                'password' => bcrypt('password'),
                'membership_id' => '3',
                'role_id' => '3'
            )
        ));
    }
}
