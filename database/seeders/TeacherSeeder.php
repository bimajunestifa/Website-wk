<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Kunedi, S.Si.',
                'role' => 'Kepala SMK Wikrama 1 Garut',
                'photo_url' => '/assets/images/dd0e5c11ab3b8a9eb83e87eb6f910855bd57af94-1.png',
                'bio' => 'Pemimpin sekolah visioner dengan fokus pada penguatan karakter dan teknologi.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Agustian Hardi, S.Kom',
                'role' => 'Wakasek Kesiswaan',
                'photo_url' => '/assets/images/088bbf9b7d5a027035c15861cd0f29c8a78372d2.png',
                'bio' => 'Membina kedisiplinan, kepemimpinan, dan kegiatan kesiswaan berkarakter.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Melinda Arista, S.Pd',
                'role' => 'Wakasek Kurikulum',
                'photo_url' => '/assets/images/db7c708a501c3f4af7213dc0f527c0a63aa5e292.png',
                'bio' => 'Mengawal implementasi kurikulum merdeka dan penyelarasan standar industri.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Inda Muliana, S.Kom',
                'role' => 'Kaprog Pengembangan Perangkat Lunak & Gim',
                'photo_url' => '/assets/images/3cbe998ab373e98e89dc5d2ac00ba7789b2b648a-e1761057741710.png',
                'bio' => 'Kepala Program Keahlian PPLG bidang rekayasa web, mobile, dan game development.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Dede Mulyana, S.Kom',
                'role' => 'Kaprog Teknik Jaringan Komputer & Telekomunikasi',
                'photo_url' => '/assets/images/Dede_Mulyana__1_-removebg-preview.png',
                'bio' => 'Kepala Program Keahlian TJKT bidang cloud, cyber security, dan infrastruktur IT.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Putri A Dalillah, S.Ikom',
                'role' => 'Kaprog Pemasaran',
                'photo_url' => '/assets/images/1e256b589e3a59e0b205e2413fb679b8e70fb87f-1-682x1024.jpg',
                'bio' => 'Kepala Program Keahlian Pemasaran / Bisnis Digital dan Social Media Marketing.',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Sri Adilati, S.Pd.',
                'role' => 'Kaprog Perhotelan',
                'photo_url' => '/assets/images/Sri-Adilati-1.jpeg',
                'bio' => 'Kepala Program Keahlian Perhotelan standar bintang lima dan hospitality.',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Reni Soniawati, S.E',
                'role' => 'Koordinator Program Kewirausahaan & TeFa',
                'photo_url' => '/assets/images/Reni-1-1021x1024.jpg',
                'bio' => 'Mengembangkan unit Teaching Factory dan jiwa entrepreneurship siswa.',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'Risma Dwi Agustina, S.Pd',
                'role' => 'Pembina Karir dan Bimbingan Konseling',
                'photo_url' => '/assets/images/Risma-1-1024x1024.jpg',
                'bio' => 'Mendampingi peminatan, karir kerja, dan studi lanjut perguruan tinggi.',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'name' => 'Arif Hidayat, S.Pd.I.',
                'role' => 'Pembina Akhlak Mulia',
                'photo_url' => '/assets/images/Arif-1.jpeg',
                'bio' => 'Membina 8 kegiatan pembiasaan akhlak mulia dan keteladanan Qurani.',
                'order' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'Muhamad Nurjalil, S.Pd',
                'role' => 'Pembina Usaha Kesehatan Sekolah',
                'photo_url' => '/assets/images/logo-wikrama.png',
                'bio' => 'Mengelola kesehatan lingkungan dan kebugaran jasmani seluruh siswa.',
                'order' => 11,
                'is_active' => true,
            ],
            [
                'name' => 'Mimin Muhaemin, S.Pd I',
                'role' => 'Koordinator Data dan Informasi',
                'photo_url' => '/assets/images/Mimin-removebg-preview.png',
                'bio' => 'Pengelolaan data pokok pendidikan (Dapodik) dan sistem informasi sekolah.',
                'order' => 12,
                'is_active' => true,
            ],
            [
                'name' => 'Intan Mutiara, S.Pd.',
                'role' => 'Manager Prestasi',
                'photo_url' => '/assets/images/pas-poto-intan-1-1024x1024.jpg',
                'bio' => 'Membina dan mengawal siswa dalam ajang perlombaan LKS, sains, dan seni.',
                'order' => 13,
                'is_active' => true,
            ],
            [
                'name' => 'Rais Saputra',
                'role' => 'Hubungan Masyarakat dan Industri',
                'photo_url' => '/assets/images/Pak-Rais.jpg',
                'bio' => 'Menjembatani kerjasama kemitraan dengan 210+ industri mitra sekolah.',
                'order' => 14,
                'is_active' => true,
            ],
            [
                'name' => 'Ambu Maskanah',
                'role' => 'Koordinator Pengasuhan Santri',
                'photo_url' => '/assets/images/logo-wikrama.png',
                'bio' => 'Mendampingi kepengasuhan dan pembinaan santri asrama sekolah.',
                'order' => 15,
                'is_active' => true,
            ],
            [
                'name' => 'M Ragil Rio Reifan',
                'role' => 'Pengelolaan Internet, Server dan K3',
                'photo_url' => '/assets/images/Ragil_Rio-removebg-preview.png',
                'bio' => 'Penanggung jawab infrastruktur jaringan, server, dan keselamatan kerja.',
                'order' => 16,
                'is_active' => true,
            ],
        ];

        foreach ($teachers as $data) {
            Teacher::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}

