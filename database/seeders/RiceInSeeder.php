<?php

namespace Database\Seeders;

use App\Models\RiceIn;
use App\Models\TotalRice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RiceInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'quantity' => 100,
                'source' => 'individual',
                'contributor_name' => 'Rama Can',
                'created_at' => '2023-10-01'
            ],
            [
                'quantity' => 600,
                'source' => 'corporate',
                'contributor_name' => 'PT. Telkom Indonesia',
                'created_at' => '2023-11-02'
            ],
            [
                'quantity' => 400,
                'source' => 'corporate',
                'contributor_name' => 'PT. PLN',
                'created_at' => '2023-12-02'
            ],
            [
                'quantity' => 500,
                'source' => 'corporate',
                'contributor_name' => 'PT. Bukaka Indonesia',
                'created_at' => '2024-01-02'
            ],
        ];

        $totalQuantity = 0;
        foreach ($data as $item) {
            RiceIn::create($item);
            $totalQuantity += $item['quantity'];
        }
        TotalRice::create([
            'total' => $totalQuantity
        ]);
    }
}