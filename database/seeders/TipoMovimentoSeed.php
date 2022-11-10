<?php

namespace Database\Seeders;

use App\Models\TipoMovimento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoMovimentoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoMovimento::factory()
            ->count(5)
            ->create();
    }
}
