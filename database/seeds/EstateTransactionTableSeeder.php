<?php

use Illuminate\Database\Seeder;

class EstateTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estate_transaction')->insert(array(
            array(
                'estate_id' => '1',
                'transaction_id' => '1'
            ),
            array(
                'estate_id' => '2',
                'transaction_id' => '2'
            ),
            array(
                'estate_id' => '3',
                'transaction_id' => '3'
            )
        ));
    }
}
