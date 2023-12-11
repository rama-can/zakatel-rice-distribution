<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'site_title', 'value' => 'Zakatel'
            ],
            [
                'key' => 'favicon', 'value' => 'images/general/favicon_zakatel.png'
            ],
            [
                'key' => 'logo', 'value' => 'images/general/logo_zakatel.png'
            ],
            [
                'key' => 'zakatel_visi',
                'value' => '<p>Menjadikan Zakatel sebagai Lembaga AMil Zakat, yang :</p><ul><li>Terpercaya</li><li>Amanah</li><li>Profesional</li><li>Transparan, dan</li><li>Terdepan dalam gerakan Pemberdayaan Ekonomi Produktif (PEP), Charity dan Emergency</li></ul>'
            ],
            [
                'key' => 'zakatel_misi',
                'value' => '<ul><li>Mensosialisasi edukasi kesadaran menunaikan ZISW</li><li>Mengumpulkan, menyalurkan dan mengembangkan pemberdayaan dana ZISW sesuai syari’at Islam</li></ul> '
            ],
            [
                'key' => 'zakatel_legalitas',
                'value' =>
                '<ul><li>1.A. AKTE NOTARIS</li></ul><p class="ql-indent-1">Nirmalasari, S.H., M.Kn Nomor 6 tanggal 9 Desember 2011</p><ul><li>1.B. SK KEMENHUKAM</li></ul><p class="ql-indent-1">No. AHUI-1343.AH.01.04 Tahun 2012 tanggal 20 Maret 2012</p><ul><li>2.A. AKTE NOTARIS</li></ul><p class="ql-indent-1">Nirmalasari, S.H., M.Kn Nomor 64 tgl 12 April 2018</p><ul><li>2.B. SK KEMENHUKAM</li></ul><p class="ql-indent-1">No. AHU-AH.01.06-0008947 tanggal 17 April 2018</p><ul><li>3.A. AKTE NOTARIS</li></ul><p class="ql-indent-1">Sonny Ario Sulaksono. SH.,M.Kn nomor 2 tanggal 21 Agustus 2020</p><ul><li>3.B. SK KEMENHUKAM</li></ul><p class="ql-indent-1">No. AHU-0018450.AH.01.12 Tahun 2020 tanggal 24 Agustus 2020</p>'
            ],
            [
                'key' => 'zakatel_sejarah', 'value' => 'Zakatel'
            ],
        ];

        Setting::insert($data);
    }
}