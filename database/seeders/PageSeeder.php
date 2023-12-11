<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Tetang Kami',
                'slug' => 'tentang-kami',
                'description' => 'Zakatel adalah sebuah lembaga nir laba yang mengelola zakat, infak, shodaqoh, dan wakaf dan mendistribusikannya kepada yang berhak sesuai syariat Islam.',
                'content' => '<p>Zakatel adalah sebuah lembaga nir laba yang mengelola zakat, infak, shodaqoh, dan wakaf dan mendistribusikannya kepada yang berhak sesuai syariat Islam.</p>'
                    . '<p>Jumat, 1 Juli 2011 bertepatan dengan 29 Rajab 1432 H menjadi hari bersejarah bagi Gerakan Sosial Keagamaan di lingkungan Pensiun Telkom. Pada hari itu, PP P2Tel melalui beberapa anggotanya sepakat untuk mendirikan yayasan yaitu Lembaga Amil Zakat (LAZ) “Zakatel Citra Caraka” yang kemudian dikenal dengan nama “ZAKATEL”</p>',
                'image' => 'images/page.webp',
                'status' => 'published',
            ],
        ];

        foreach ($data as $page) {
            \App\Models\Page::create($page);
        }
    }
}