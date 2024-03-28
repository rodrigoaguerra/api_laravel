<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cep;

class CepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cep::create([
            'cep' => '83404-400',
            'logradouro' => 'Rua Amazonas',
            'bairro' => 'Campo Pequeno',
            'localidade' => 'Colombo',
            'uf' => 'PR',
        ]);
        Cep::create([
            'cep' => '80240-040',
            'logradouro' => 'Av. Pres. Getúlio Vargas',
            'bairro' => 'Água Verde',
            'localidade' => 'Curitiba',
            'uf' => 'PR',
        ]);
        Cep::create([
            'cep' => '82620-070',
            'logradouro' => 'Rua Francisco Guilherme Bahr',
            'bairro' => 'Tingui',
            'localidade' => 'Curitiba',
            'uf' => 'PR',
        ]);
        Cep::create([
            'cep' => '82620-035',
            'logradouro' => 'Rua Guilherme Ihlenfeldt - de 441/442 ao fim',
            'bairro' => 'Tingui',
            'localidade' => 'Curitiba',
            'uf' => 'PR',
        ]);
        Cep::create([
            'cep' => '82630-160',
            'logradouro' => 'Estrada das Olarias',
            'bairro' => 'Atuba',
            'localidade' => 'Curitiba',
            'uf' => 'PR',
        ]);
    }
}
