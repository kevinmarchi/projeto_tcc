<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbestado')->insert(array (
            0 =>
                array (
                    'estnome' => 'Acre',
                    'estuf' => 'AC',
                ),
            1 =>
                array (
                    'estnome' => 'Alagoas',
                    'estuf' => 'AL',
                ),
            2 =>
                array (
                    'estnome' => 'Amazonas',
                    'estuf' => 'AM',
                ),
            3 =>
                array (
                    'estnome' => 'Amapá',
                    'estuf' => 'AP',
                ),
            4 =>
                array (
                    'estnome' => 'Bahia',
                    'estuf' => 'BA',
                ),
            5 =>
                array (
                    'estnome' => 'Ceará',
                    'estuf' => 'CE',
                ),
            6 =>
                array (
                    'estnome' => 'Distrito Federal',
                    'estuf' => 'DF',
                ),
            7 =>
                array (
                    'estnome' => 'Espírito Santo',
                    'estuf' => 'ES',
                ),
            8 =>
                array (
                    'estnome' => 'Goiás',
                    'estuf' => 'GO',
                ),
            9 =>
                array (
                    'estnome' => 'Maranhão',
                    'estuf' => 'MA',
                ),
            10 =>
                array (
                    'estnome' => 'Minas Gerais',
                    'estuf' => 'MG',
                ),
            11 =>
                array (
                    'estnome' => 'Mato Grosso do Sul',
                    'estuf' => 'MS',
                ),
            12 =>
                array (
                    'estnome' => 'Mato Grosso',
                    'estuf' => 'MT',
                ),
            13 =>
                array (
                    'estnome' => 'Pará',
                    'estuf' => 'PA',
                ),
            14 =>
                array (
                    'estnome' => 'Paraiba',
                    'estuf' => 'PB',
                ),
            15 =>
                array (
                    'estnome' => 'Pernambuco',
                    'estuf' => 'PE',
                ),
            16 =>
                array (
                    'estnome' => 'Piauí',
                    'estuf' => 'PI',
                ),
            17 =>
                array (
                    'estnome' => 'Paraná',
                    'estuf' => 'PR',
                ),
            18 =>
                array (
                    'estnome' => 'Rio de Janeiro',
                    'estuf' => 'RJ',
                ),
            19 =>
                array (
                    'estnome' => 'Rio Grande do Norte',
                    'estuf' => 'RN',
                ),
            20 =>
                array (
                    'estnome' => 'Rondônia',
                    'estuf' => 'RO',
                ),
            21 =>
                array (
                    'estnome' => 'Roraima',
                    'estuf' => 'RR',
                ),
            22 =>
                array (
                    'estnome' => 'Rio Grande do Sul',
                    'estuf' => 'RS',
                ),
            23 =>
                array (
                    'estnome' => 'Santa Catarina',
                    'estuf' => 'SC',
                ),
            24 =>
                array (
                    'estnome' => 'Sergipe',
                    'estuf' => 'SE',
                ),
            25 =>
                array (
                    'estnome' => 'São Paulo',
                    'estuf' => 'SP',
                ),
            26 =>
                array (
                    'estnome' => 'Tocantins',
                    'estuf' => 'TO',
                ),
        ));
    }
}
