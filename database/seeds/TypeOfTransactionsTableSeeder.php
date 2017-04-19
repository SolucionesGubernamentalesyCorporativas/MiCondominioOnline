<?php

use Illuminate\Database\Seeder;

class TypeOfTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_transactions')->insert(array(
            array(
                'name' => 'Mantenimiento',
                'income_outcome' => '1'
            ),
            array(
                'name' => 'Jardinero',
                'income_outcome' => '0'
            ),
            array(
                'name' => 'Seguridad',
                'income_outcome' => '0'
            ),
        ));
    }
}
