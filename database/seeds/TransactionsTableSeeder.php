<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert(array(
            array(
                'observations' => 'Cuota mensual de mantenimiento',
                'ammount' => '12000.00',
                'type_of_transaction_id' => '1'
            ),
            array(
                'observations' => 'Pago de servicios',
                'ammount' => '750.00',
                'type_of_transaction_id' => '2'
            ),
            array(
                'observations' => 'Pago a SeguriFenix',
                'ammount' => '3000.00',
                'type_of_transaction_id' => '3'
            )
        ));
    }
}
