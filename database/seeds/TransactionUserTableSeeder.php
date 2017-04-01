<?php

use Illuminate\Database\Seeder;

class TransactionUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_user')->insert(array(
            array(
                'transaction_id' => '1',
                'user_id' => '1'
            ),
            array(
                'transaction_id' => '2',
                'user_id' => '2'
            ),
            array(
                'transaction_id' => '3',
                'user_id' => '3'
            )
        ));
    }
}
