<?php

use Illuminate\Database\Seeder;

class ReceiptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receipts')->insert(array(
            array(
                'date' => '2017-06-09',
                'name_of_img' => 'Factura mantenimiento',
                'type_of_img' => 'Factura',
                'transaction_id' => '1'
            ),
            array(
                'date' => '2017-06-13',
                'name_of_img' => 'Nota jardinero',
                'type_of_img' => 'Nota',
                'transaction_id' => '2'
            ),
            array(
                'date' => '2017-06-15',
                'name_of_img' => 'Factura seguridad',
                'type_of_img' => 'Factura',
                'transaction_id' => '3'
            )
        ));
    }
}
