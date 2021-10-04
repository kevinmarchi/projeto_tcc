<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        $this->call(EstadoSeeder::class);
        $this->call(CidadeSeeder::class);

        User::create([
            'usunome' => 'Kevin Marchi',
            'usucpf' => '107.758.199.80',
            'usutelefone' => '(47)98859-3232',
            'usudatanascimento' => '19/10/1999',
            'email' => 'kevin_marchi@hotmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
