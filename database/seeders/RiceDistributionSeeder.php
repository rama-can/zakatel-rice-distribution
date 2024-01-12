<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
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
                'title' => 'Distribusi Zakat untuk Masyarakat Kurang Mampu',
                'slug' => 'distribusi-zakat-masyarakat-kurang-mampu',
                'description' => 'Inisiatif ini bertujuan memberikan bantuan kepada keluarga kurang mampu di lingkungan sekitar. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt!',
                'content' => 'Bekerja sama dengan lembaga amal setempat, kami melakukan distribusi bantuan berupa barang-barang pokok dan makanan kepada keluarga yang membutuhkan. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt! Vero molestias voluptatibus nisi quaerat doloribus? Enim, doloribus dicta. Optio quis, rerum repellat laborum ea eos libero ducimus reprehenderit qui. Accusantium pariatur, deleniti quae quo commodi consectetur dolores, itaque qui praesentium dicta eius adipisci illum nesciunt.',
                'author' => 'Zakatel',
                'start_address' => '107.63204, -6.90938',
                'final_address' => '107.63664,-6.89680',
                'destination' => 'Jl. Phh. Mustofa No.23, Neglasari, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40124, Indonesia',
                'distribution_date' => '2021-11-03',
                'quantity_distributed' => 100,
                'status' => 'selesai',
                'image' => 'images/1-unsplash.jpg',
            ],
            [
                'title' => 'Program Beras Gratis untuk Anak-Anak Desa',
                'slug' => 'program-beras-gratis-anak-desa',
                'description' => 'Inisiatif ini berfokus pada penyediaan beras gratis untuk anak-anak di desa-desa terpencil. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt!',
                'content' => 'Melalui kolaborasi dengan pendidik lokal, kami menyediakan layanan beras gratis dan memberikan dukungan untuk meningkatkan akses beras di desa-desa. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt! Vero molestias voluptatibus nisi quaerat doloribus? Enim, doloribus dicta. Optio quis, rerum repellat laborum ea eos libero ducimus reprehenderit qui. Accusantium pariatur, deleniti quae quo commodi consectetur dolores, itaque qui praesentium dicta eius adipisci illum nesciunt.',
                'author' => 'Zakatel',
                'start_address' => '107.63204, -6.90938',
                'final_address' => '106.82928,-6.36350',
                'destination' => 'Jl. Lingkar, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424, Indonesia',
                'distribution_date' => '2021-11-03',
                'quantity_distributed' => 200,
                'status' => 'pending',
                'image' => 'images/2-unsplash.jpg',
            ],
            [
                'title' => 'Bantuan Beras Gratis untuk Lansia',
                'slug' => 'bantuan-beras-gratis-lansia',
                'description' => 'Inisiatif ini menargetkan penyediaan bantuan beras gratis kepada lansia yang membutuhkan. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt!',
                'content' => 'Dengan dukungan dari tenaga medis setempat, kami memberikan pelayanan beras gratis kepada lansia, termasuk pemeriksaan beras rutin dan distribusi obat-obatan. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt! Vero molestias voluptatibus nisi quaerat doloribus? Enim, doloribus dicta. Optio quis, rerum repellat laborum ea eos libero ducimus reprehenderit qui. Accusantium pariatur, deleniti quae quo commodi consectetur dolores, itaque qui praesentium dicta eius adipisci illum nesciunt.',
                'author' => 'Zakatel',
                'start_address' => '107.63204, -6.90938',
                'final_address' => '106.72996,-6.55968',
                'destination' => 'Kampus IPB, Jl. Raya Dramaga, Babakan, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680, Indonesia',
                'distribution_date' => '2021-11-03',
                'quantity_distributed' => 300,
                'status' => 'dalam pengiriman',
                'image' => 'images/3-unsplash.jpg',
            ],
            [
                'title' => 'Beras Gratis Untuk di Desa Tertinggal',
                'slug' => 'beras-gratis-untuk-desa-tertinggal',
                'description' => 'Inisiatif ini bertujuan meningkatkan akses air bersih dengan membangun sumur di desa-desa yang masih tertinggal. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt!',
                'content' => 'Kami bekerja sama dengan komunitas setempat dan pihak terkait untuk membangun sumur bersih yang dapat memberikan pasokan air bersih yang aman dan terjangkau. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam esse laborum sapiente voluptatem deserunt! Vero molestias voluptatibus nisi quaerat doloribus? Enim, doloribus dicta. Optio quis, rerum repellat laborum ea eos libero ducimus reprehenderit qui. Accusantium pariatur, deleniti quae quo commodi consectetur dolores, itaque qui praesentium dicta eius adipisci illum nesciunt.',
                'author' => 'Zakatel',
                'start_address' => '107.63204, -6.90938',
                'final_address' => '106.97078,-6.24887',
                'destination' => 'QX2C+857, Jl. KH. Noer Ali, RT.005/RW.006A, Jakasampurna, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17145, Indonesia',
                'distribution_date' => '2021-11-03',
                'quantity_distributed' => 100,
                'status' => 'selesai',
                'image' => 'images/4-unsplash.jpg',
            ]
        ];

        $totalQuantity = 0;
        $date = ['2023-10-12', '2023-11-03', '2023-12-04', '2024-01-05'];
        sort($date);
        foreach ($data as $index => $page) {
            $riceDistribution = \App\Models\RiceDistribution::create($page);
            $totalQuantity += $page['quantity_distributed'];
            \App\Models\RiceOut::create([
                'rice_distribution_id' => $riceDistribution->id,
                'created_at' =>  $date[$index]
            ]);
        }
        $currentTotalRice = \App\Models\TotalRice::first();
        $currentTotalRice->update([
            'total' => $currentTotalRice->total - $totalQuantity
        ]);
    }
}