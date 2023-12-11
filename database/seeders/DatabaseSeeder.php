<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RiceDistribution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Rama Can',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('tetap10jam')
        ]);
        \App\Models\User::factory(20)->create();
        $this->call([
            PageSeeder::class,
            SettingSeeder::class,
            RiceInSeeder::class,
            RiceDistributionSeeder::class,
        ]);
    }
}