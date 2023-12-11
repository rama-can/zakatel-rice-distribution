<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RiceDistributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Zakat Example 1',
                'slug' => 'zakat-example-1',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt!',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt! Vero molestias voluptatibus nisi quaerat doloribus? Enim, doloribus dicta. Optio quis, rerum repellat laborum ea eos libero ducimus reprehenderit qui. Accusantium pariatur, deleniti quae quo commodi consectetur dolores, itaque qui praesentium dicta eius adipisci illum nesciunt.',
                'author' => 'Zakatel',
                'start_address' => '107.63204, -6.90938',
                'final_address' => '107.63204, -6.90938',
                'destination' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                'distribution_date' => '2021-11-03',
                'quantity_distributed' => 100,
                'status' => 'selesai',
                'image' => 'images/1-unsplash.jpg',
            ],
            [
                'title' => 'Zakat Example 2',
                'slug' => 'zakat-example-2',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt!',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum        sapiente voluptatem deserunt! Vero molestias voluptatibus nisi quaerat doloribus? Enim, doloribus dicta. Optio quis, rerum repellat laborum ea eos libero ducimus reprehenderit qui. Accusantium pariatur, deleniti quae quo commodi consectetur dolores, itaque qui praesentium dicta eius adipisci illum nesciunt.',
                'author' => 'Zakatel',
                'start_address' => '107.63204, -6.90938',
                'final_address' => '107.63204, -6.90938',
                'destination' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                'distribution_date' => '2021-11-03',
                'quantity_distributed' => 200,
                'status' => 'pending',
                'image' => 'images/2-unsplash.jpg',
            ],
            [
                'title' => 'Zakat Example 3',
                'slug' => 'zakat-example-3',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt!',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum        sapiente voluptatem deserunt! Vero molestias voluptatibus nisi quaerat doloribus? Enim, doloribus dicta. Optio quis, rerum repellat laborum ea eos libero ducimus reprehenderit qui. Accusantium pariatur, deleniti quae quo commodi consectetur dolores, itaque qui praesentium dicta eius adipisci illum nesciunt.',
                'author' => 'Zakatel',
                'start_address' => '107.63204, -6.90938',
                'final_address' => '107.63204, -6.90938',
                'destination' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                'distribution_date' => '2021-11-03',
                'quantity_distributed' => 300,
                'status' => 'dalam pengiriman',
                'image' => 'images/3-unsplash.jpg',
            ],
            [
                'title' => 'Zakat Example 4',
                'slug' => 'zakat-example-4',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt!',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum        sapiente voluptatem deserunt! Vero molestias voluptatibus nisi quaerat doloribus? Enim, doloribus dicta. Optio quis, rerum repellat laborum ea eos libero ducimus reprehenderit qui. Accusantium pariatur, deleniti quae quo commodi consectetur dolores, itaque qui praesentium dicta eius adipisci illum nesciunt.',
                'author' => 'Zakatel',
                'start_address' => '107.63204, -6.90938',
                'final_address' => '107.63204, -6.90938',
                'destination' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                'distribution_date' => '2021-11-03',
                'quantity_distributed' => 100,
                'status' => 'selesai',
                'image' => 'images/4-unsplash.jpg',
            ]
        ];

        $totalQuantity = 0;
        foreach ($data as $page) {
            $riceDistribution = \App\Models\RiceDistribution::create($page);
            $totalQuantity += $page['quantity_distributed'];
            \App\Models\RiceOut::create([
                'rice_distribution_id' => $riceDistribution->id
            ]);
        }
        $currentTotalRice = \App\Models\TotalRice::first();
        $currentTotalRice->update([
            'total' => $currentTotalRice->total - $totalQuantity
        ]);
    }
}
