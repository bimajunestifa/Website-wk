<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeFeatureCard;
use App\Models\SchoolProfile;

class HomeFeatureCardSeeder extends Seeder
{
    public function run(): void
    {
        // Update School Profile section titles & buttons if null or default
        $profile = SchoolProfile::first();
        if ($profile) {
            $profile->update([
                'character_section_title' => $profile->character_section_title ?: "Tiada pendidikan bermutu,\ntanpa pendidikan karakter",
                'character_section_btn_text' => $profile->character_section_btn_text ?: 'Daftar Sekarang',
                'character_section_btn_url' => $profile->character_section_btn_url ?: '/spmb',
                'culture_section_title' => $profile->culture_section_title ?: 'Tiada pendidikan karakter, tanpa budaya sekolah',
                'culture_section_btn_text' => $profile->culture_section_btn_text ?: 'Pelajari Lebih Lanjut ->',
                'culture_section_btn_url' => $profile->culture_section_btn_url ?: '/spmb',
                'learning_section_subtitle' => $profile->learning_section_subtitle ?: 'SMK Wikrama 1 Garut',
                'learning_section_title' => $profile->learning_section_title ?: 'Tiada masyarakat pembelajar sekolah, tanpa pemimpin perubaban sekolah, dan tanpa kesungguhan warga sekolah',
            ]);
        }

        $cards = [
            // Seksi 1: Karakter (Tiada pendidikan bermutu, tanpa pendidikan karakter)
            [
                'section' => 'karakter',
                'title' => 'Lulusan',
                'description' => 'Lulusannya diminati oleh dunia kerja, lolos perguruan tinggi ternama, dan, bermental wirausaha.',
                'image_url' => '/assets/images/e3bcbf6c79a441d4098422af6489473116861a60-1024x683.jpg',
                'link_url' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'section' => 'karakter',
                'title' => 'Pengelolaan',
                'description' => 'Dikelola secara profesional bersama konsultan IDS Rumah Pendidikan Indonesia.',
                'image_url' => '/assets/images/Rectangle-2.png',
                'link_url' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'section' => 'karakter',
                'title' => 'Guru',
                'description' => 'Guru-guru inspiratif yang mendidik dengan hati dan teknologi.',
                'image_url' => '/assets/images/Rectangle-2-1.png',
                'link_url' => '/sumber-daya#tenaga-pengajar',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'section' => 'karakter',
                'title' => 'Budaya',
                'description' => 'Berbudaya Akhlakul Karimah yang mencetak pribadi qur’ani sesuai dengan Profil Pelajar Pancasila.',
                'image_url' => '/assets/images/Rectangle-2-2.png',
                'link_url' => null,
                'order' => 4,
                'is_active' => true,
            ],

            // Seksi 2: Budaya Sekolah (Tiada pendidikan karakter, tanpa budaya sekolah)
            [
                'section' => 'budaya',
                'title' => 'Suasana',
                'description' => 'Atmosfer pendidikan yang ramah anak.',
                'image_url' => '/assets/images/maxresdefault-2-1024x576.jpg',
                'link_url' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'section' => 'budaya',
                'title' => 'LMS',
                'description' => 'Sistem informasi managemen sekolah berbasis komputer dengan Kejar.id',
                'image_url' => '/assets/images/179cf0b96d661d53003f330d057d2f3f12679201-1-1024x682.jpg',
                'link_url' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'section' => 'budaya',
                'title' => 'Kurikulum',
                'description' => 'Kurikulum holistik dengan Pembelajaran Mendalam, Koding, dan Kecerdasan Artifisial.',
                'image_url' => '/assets/images/learning.png',
                'link_url' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'section' => 'budaya',
                'title' => 'Teaching Factory',
                'description' => 'Pembelajaran berbasis proyek bernilai ekonomi.',
                'image_url' => '/assets/images/73fb957f607cff6d28e5ff961eb82b52ddcb83e3-1-1024x768.jpg',
                'link_url' => null,
                'order' => 4,
                'is_active' => true,
            ],

            // Seksi 3: Masyarakat Pembelajar (Tiada masyarakat pembelajar sekolah...)
            [
                'section' => 'pembelajar',
                'title' => 'Program Matrikulasi',
                'description' => 'Memperkuat landasan pacu belajar',
                'image_url' => '/assets/images/Rectangle-6.png',
                'link_url' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'section' => 'pembelajar',
                'title' => 'Lulusan',
                'description' => 'Lulusannya diminati oleh dunia kerja, lolos perguruan tinggi ternama, dan, bermental wirausaha.',
                'image_url' => '/assets/images/1695784651-post.jpg',
                'link_url' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'section' => 'pembelajar',
                'title' => 'Moving Class',
                'description' => 'Suasana kelas yang sesuai dengan mata pelajaran',
                'image_url' => '/assets/images/Ruang-TJKT-Compress-1024x768.jpeg',
                'link_url' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'section' => 'pembelajar',
                'title' => 'Sistem Belajar Bertiga',
                'description' => 'Membangun kepemimpinan dan dinamika kelompok',
                'image_url' => '/assets/images/WhatsApp-Image-2022-10-19-at-10.52.21-1024x576-1-360x554-2.jpeg',
                'link_url' => null,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($cards as $cardData) {
            HomeFeatureCard::updateOrCreate(
                ['section' => $cardData['section'], 'title' => $cardData['title']],
                $cardData
            );
        }
    }
}

