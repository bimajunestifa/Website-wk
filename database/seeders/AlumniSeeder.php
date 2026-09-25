<?php

namespace Database\Seeders;

use App\Models\Alumni;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Clean up testimonials to keep it strictly for SPMB
        Testimonial::where('name', 'like', '%Ujang Amir%')->delete();

        // 2. Seed original alumni for Sumber Daya (/sumber-daya)
        $alumnis = [
            [
                'name' => "Ujang Amir Ma'rup",
                'company' => "PT Dermaga Rezeki Indonesia",
                'profession' => "Owner",
                'major' => "Pengembangan Perangkat Lunak & Gim",
                'graduation_year' => "2020",
                'photo_url' => "/assets/images/ujang.png",
                'quote' => "Wikrama memberikan fondasi disiplin, teknologi, dan akhlak yang mengantarkan saya mampu memimpin usaha sendiri.",
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => "Auriel Lyva",
                'company' => "Hotel Santika",
                'profession' => "Operational Staff",
                'major' => "Perhotelan",
                'graduation_year' => "2021",
                'photo_url' => "/assets/images/RISA.png",
                'quote' => "Pendidikan vokasi di Wikrama benar-benar sesuai dengan standar industri perhotelan bintang internasional.",
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => "Ichsan M Baharie",
                'company' => "PT Madani Intelsysdata",
                'profession' => "ETL Developer",
                'major' => "Pengembangan Perangkat Lunak & Gim",
                'graduation_year' => "2020",
                'photo_url' => "/assets/images/Ellipse-23.png",
                'quote' => "Ilmu pemrograman dan basis data yang diajarkan sangat aplikatif dan dibutuhkan dunia kerja saat ini.",
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => "Desta Alhasa",
                'company' => "PT Intan Kharisma Group",
                'profession' => "Owner",
                'major' => "Desain Komunikasi Visual",
                'graduation_year' => "2021",
                'photo_url' => "/assets/images/desta.png",
                'quote' => "Kreativitas dan etos kerja yang dibentuk di Wikrama menjadi bekal utama dalam membangun bisnis kreatif.",
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => "Abdurahman Faras",
                'company' => "Techno Infinity",
                'profession' => "Programmer",
                'major' => "Pengembangan Perangkat Lunak & Gim",
                'graduation_year' => "2022",
                'photo_url' => "/assets/images/faras.png",
                'quote' => "Pembelajaran berbasis proyek di Wikrama membuat transisi ke industri software terasa sangat natural dan siap pakai.",
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => "Abdusalam Yazid",
                'company' => "101 Urban Thamrin",
                'profession' => "Digital Marketing",
                'major' => "Teknik Jaringan Komputer & Telekomunikasi",
                'graduation_year' => "2019",
                'photo_url' => "/assets/images/yazid.png",
                'quote' => "Wikrama mengajarkan kami untuk terus adaptif terhadap perkembangan dunia digital dan industri modern.",
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($alumnis as $data) {
            Alumni::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}

