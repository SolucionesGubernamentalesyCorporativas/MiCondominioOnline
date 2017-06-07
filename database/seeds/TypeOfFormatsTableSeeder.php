<?php

use Illuminate\Database\Seeder;

class TypeOfFormatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_formats')->insert(array(
            array(
                'name' => 'Acta constitutiva',
                'description' => 'Documento o constancia notarial en la que se registran los datos referentes a la información de una sociedad o agrupación.'
            ),
            array(
                'name' => 'Minuta',
                'description' => 'Borrador que se hace de un escrito, especialmente de un contrato, antes de redactarlo definitivamente.'
            ),
            array(
                'name' => 'Reglamento',
                'description' => 'Conjunto de disposiciones internas de cada condominio'
            )
        ));
    }
}
