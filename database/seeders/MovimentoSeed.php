<?php

namespace Database\Seeders;

use App\Models\Movimento;
use App\Models\TipoMovimento;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovimentoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movimento::factory()
            ->count(1000)
            ->create();
    }
}
