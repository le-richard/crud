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
        DB::table('estados')->insert([
            'ds_estado' => 'Acre',
            'uf' => 'AC',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Alagoas',
            'uf' => 'AL',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Amapá',
            'uf' => 'AP',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Amazonas',
            'uf' => 'AM',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Bahia',
            'uf' => 'BA',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Ceará',
            'uf' => 'CE',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Distrito Federal',
            'uf' => 'DF',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Espírito Santo',
            'uf' => 'ES',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Goiás',
            'uf' => 'GO',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Maranhão',
            'uf' => 'MA',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Mato Grosso',
            'uf' => 'MT',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Mato Grosso do Sul',
            'uf' => 'MS',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Minas Gerais',
            'uf' => 'MG',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Pará',
            'uf' => 'PA',
        ]);
        
        DB::table('estados')->insert([
            'ds_estado' => 'Paraíba',
            'uf' => 'PB',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Paraná',
            'uf' => 'PR',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Pernambuco',
            'uf' => 'PB',
        ]);
        
        DB::table('estados')->insert([
            'ds_estado' => 'Piauí',
            'uf' => 'PI',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Rio de Janeiro',
            'uf' => 'RJ',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Rio Grande do Norte',
            'uf' => 'RN',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Rio Grande do Sul',
            'uf' => 'RS',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Rondônia',
            'uf' => 'RO',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Roraima',
            'uf' => 'RR',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Santa Catarina',
            'uf' => 'SC',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'São Paulo',
            'uf' => 'SP',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Sergipe',
            'uf' => 'SE',
        ]);

        DB::table('estados')->insert([
            'ds_estado' => 'Tocantins',
            'uf' => 'TO',
        ]);

    }
}
