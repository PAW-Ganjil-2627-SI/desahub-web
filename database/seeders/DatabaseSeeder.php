<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::updateOrCreate([
            'username' => 'admin'],
            [
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate([
            'username' => 'petugas'],
            [
                'password' => Hash::make('petugas12345'),
                'role' => 'petugas',
            ]
        );

        $this->call(PengaduanSeeder::class);
    }
}
