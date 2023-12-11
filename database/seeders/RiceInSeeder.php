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
            ],
            [
                'quantity' => 600,
                'source' => 'corporate',
                'contributor_name' => 'PT. Telkom Indonesia',
            ],
            [
                'quantity' => 400,
                'source' => 'corporate',
                'contributor_name' => 'PT. PLN',
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