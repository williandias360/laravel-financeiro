<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            "name" => "Willian Dias Brito",
            "email" => "willian.dias360@gmail.com",
            "password" => Hash::make("Acesso225533@"),
        ]);

        User::factory()->create([
            "name" => "Joyce Milena H. da Silva Brito",
            "email" => "joycemhsilva@gmail.com",
            "password" => Hash::make("Acesso225533@"),
        ]);

        $this->call([
            TipoMovimentoSeed::class,
            MovimentoSeed::class,
        ]);
    }
}
