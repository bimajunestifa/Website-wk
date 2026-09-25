<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SchoolProfile;
use App\Models\VisionMission;
use App\Models\Slider;
use App\Models\Major;
use App\Models\Facility;
use App\Models\EducationReport;
use App\Models\SchoolCulture;
use App\Models\Partner;
use App\Models\News;
use App\Models\Achievement;
use App\Models\Gallery;
use App\Models\Testimonial;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@smkwikrama1garut.sch.id'],
            [
                'name' => 'Admin Wikrama',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. School Profile
        SchoolProfile::updateOrCreate(
            ['id' => 1],
            [
                'school_name' => 'SMK Wikrama 1 Garut',
                'tagline' => 'Solusi Pendidikan Akhlaq Modern Era 4.0',
                'motto' => 'Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah',
                'afirmasi' => 'Padamu negeri - kami berjanji - lulus Wikrama siap membangun negeri',
                'attitude' => 'Aku ada lingkunganku bahagia',
                'philosophy' => 'Ilmu yang Amaliah, Amal yang Ilmiah, Akhlaqul Karimah',
                'description' => 'SMK Wikrama 1 Garut merupakan Sekolah Menengah Kejuruan Pusat Keunggulan yang berfokus pada pembentukan akhlak mulia dan kompetensi teknologi industri 4.0 & 5.0.',
                'principal_name' => 'Kunedi, S.Si.',
                'principal_title' => 'Kepala SMK Wikrama 1 Garut',
                'principal_image' => '/assets/images/dd0e5c11ab3b8a9eb83e87eb6f910855bd57af94-e1760860109509.png',
                'video_url' => 'https://www.youtube.com/watch?v=XVoDV4ry3HA',
                'video_thumbnail' => '/assets/images/ae4edea9908b4c61454d4922b92778c539618ad5.jpg',
                'phone' => '0813-2331-4430',
                'whatsapp' => '628112232880',
                'email' => 'info@smkwikrama1garut.sch.id',
                'address' => 'Jl. Otto Iskandardinata Kp Tanjung RT 03 RW 13 Ds Pasawahan Kec Tarogong Kaler, Kabupaten Garut 44151',
                'maps_embed_url' => 'https://maps.google.com/maps?q=SMK%20Wikrama%201%20Garut&t=m&z=15&output=embed&iwloc=near',
                'brochure_url' => 'http://brosur.smkwikrama1garut.sch.id/',
                'spmb_url' => '/spmb',
            ]
        );

        // 3. Vision and Mission
        VisionMission::updateOrCreate(
            ['id' => 1],
            [
                'vision' => 'Menjadi sekolah kejuruan teladan nasional yang berbudaya lingkungan berkelanjutan, berbasis teknologi informasi, berkomitmen mencetak lulusan berkarakter mulia, sehat jasmani rohani, berdaya saing global, serta mampu beradaptasi dengan perkembangan industri 4.0 dan 5.0 dengan berpedoman pada Al Qur\'an dan Hadis.',
                'mission' => [
                    'Mendidik anak bangsa dengan hati dan teknologi sehingga memenuhi kebutuhan mutu dunia kerja.',
                    'Menyelenggarakan pendidikan yang berfokus pada pengembangan karakter dan moral siswa.',
                    'Membangun kebersamaan sosial, jiwa kewirausahaan, serta gerakan cinta tanah air dan lingkungan.',
                    'Menerapkan manajemen berbasis data dengan memanfaatkan teknologi informasi.'
                ],
                'motto' => 'Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah',
            ]
        );

        // 4. Hero Sliders (Beranda)
        $homeSliders = [
            [
                'type' => 'home',
                'title' => 'Transformasi Masa Depan',
                'subtitle' => 'Membangun generasi berakhlak mulia melalui pendidikan berbasis teknologi dan nilai spiritual. Kami percaya, kemajuan sejati berawal dari karakter dan integritas.',
                'image_url' => '/assets/images/f1055d2abe9bdabebbacebf57a47380f570ef1be-1.jpg',
                'btn_text' => 'Daftar Sekarang (SPMB)',
                'btn_url' => '/spmb',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'type' => 'home',
                'title' => 'Pendidikan Bernilai dan Bermartabat',
                'subtitle' => 'Membangun generasi berakhlak mulia melalui pendidikan berbasis teknologi dan nilai spiritual. Kami percaya, kemajuan sejati berawal dari karakter dan integritas.',
                'image_url' => '/assets/images/aeef82d3362e492c49b6987a43bdc3741bd4ffd1.jpg',
                'btn_text' => 'Daftar Sekarang (SPMB)',
                'btn_url' => '/spmb',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'type' => 'home',
                'title' => 'Tiada Hari Tanpa Prestasi',
                'subtitle' => 'Mengintegrasikan keahlian, inovasi, dan etika kerja Islami. Wikrama siap mencetak tenaga profesional yang menjawab tantangan industri 5.0.',
                'image_url' => '/assets/images/1704346349-sliderslider.jpg',
                'btn_text' => 'Daftar Sekarang (SPMB)',
                'btn_url' => '/spmb',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'type' => 'home',
                'title' => 'Lulus Wikrama, Siap Membangun Negeri',
                'subtitle' => 'Membangun generasi berakhlak mulia melalui pendidikan berbasis teknologi dan nilai spiritual. Kami percaya, kemajuan sejati berawal dari karakter dan integritas.',
                'image_url' => '/assets/images/Frame-13-1.png',
                'btn_text' => 'Daftar Sekarang (SPMB)',
                'btn_url' => '/spmb',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'type' => 'home',
                'title' => 'Berpedoman pada Al-Qur’an dan Hadist',
                'subtitle' => 'Menjadikan nilai-nilai Islam sebagai fondasi setiap langkah. Kami membentuk insan yang cerdas, amanah, dan berjiwa pemimpin.',
                'image_url' => '/assets/images/179cf0b96d661d53003f330d057d2f3f12679201-2-1.jpg',
                'btn_text' => 'Daftar Sekarang (SPMB)',
                'btn_url' => '/spmb',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'type' => 'home',
                'title' => 'Menuju Keunggulan dengan Berjama’ah',
                'subtitle' => 'Kami percaya pendidikan terbaik lahir dari kolaborasi yang kuat. Guru, siswa, orang tua, dan mitra industri bersatu dalam visi mencetak generasi unggul, berilmu, dan berakhlak mulia.',
                'image_url' => '/assets/images/SLider5.png',
                'btn_text' => 'Daftar Sekarang (SPMB)',
                'btn_url' => '/spmb',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'type' => 'home',
                'title' => 'Menuju Pribadi yang Terbimbing',
                'subtitle' => 'Kami menanamkan nilai Jujur, Bersih, Hemat, Berjamaah, dan Ikhlas memberi dalam setiap proses belajar. Siswa Wikrama siap menjadi profesional yang dipercaya dunia kerja.',
                'image_url' => '/assets/images/Group-35-1-1.png',
                'btn_text' => 'Daftar Sekarang (SPMB)',
                'btn_url' => '/spmb',
                'order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($homeSliders as $sliderData) {
            Slider::updateOrCreate(
                ['title' => $sliderData['title'], 'type' => 'home'],
                $sliderData
            );
        }

        // 4b. SPMB Hero Sliders (dari spmb.html)
        $spmbSliders = [
            [
                'type' => 'spmb',
                'title' => 'SPMB TA 2026-2027 SMK Wikrama 1 Garut',
                'subtitle' => 'Ayo! segera daftarkan dirimu ke SMK Wikrama dengan cara klik PENDAFTARAN SPMB dibawah ini! Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah.',
                'image_url' => '/assets/images/spmb/BG-PPLG.jpg',
                'btn_text' => 'Pendaftaran SPMB',
                'btn_url' => '#contact-us',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'type' => 'spmb',
                'title' => 'SPMB TA 2026-2027 SMK Wikrama 1 Garut',
                'subtitle' => 'Pemasaran & Bisnis Digital - Siap bersaing di industri e-commerce global.',
                'image_url' => '/assets/images/spmb/BG-MPLB.jpg',
                'btn_text' => 'Pendaftaran SPMB',
                'btn_url' => '#contact-us',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'type' => 'spmb',
                'title' => 'SPMB TA 2026-2027 SMK Wikrama 1 Garut',
                'subtitle' => 'Perhotelan Berstandar Internasional - Keterampilan hospitality profesional.',
                'image_url' => '/assets/images/spmb/BG-HTL.jpg',
                'btn_text' => 'Pendaftaran SPMB',
                'btn_url' => '#contact-us',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'type' => 'spmb',
                'title' => 'SPMB TA 2026-2027 SMK Wikrama 1 Garut',
                'subtitle' => 'Teknik Jaringan Komputer & Telekomunikasi - Sertifikasi Mikrotik MTCNA & Cisco.',
                'image_url' => '/assets/images/spmb/BG-DKV.jpg',
                'btn_text' => 'Pendaftaran SPMB',
                'btn_url' => '#contact-us',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($spmbSliders as $sliderData) {
            Slider::updateOrCreate(
                ['title' => $sliderData['title'], 'order' => $sliderData['order'], 'type' => 'spmb'],
                $sliderData
            );
        }

        // 5. Majors (4 Kompetensi Keahlian Resmi)
        $majors = [
            [
                'name' => 'Teknik Jaringan Komputer & Telekomunikasi',
                'short_name' => 'TJKT',
                'slug' => 'tjkt',
                'description' => 'Program keahlian yang membekali peserta didik dengan keterampilan instalasi, konfigurasi, keamanan, dan administrasi infrastruktur jaringan modern, cloud computing, serta perangkat telekomunikasi mutakhir berstandar industri internasional.',
                'advantages' => 'Sertifikasi Internasional Mikrotik (MTCNA), CISCO Academy, EC-Council Cyber Security, Lab Fiber Optic & Cloud berstandar industri.',
                'career_prospects' => 'Cyber Security, IoT Engineer, Network Administrator, System Administrator, Cloud Engineer.',
                'image_url' => '/assets/images/cf9a74e8f112a3eca477d458b7bbbb09311d8aa5-1-1024x575.jpg',
                'order' => 1,
            ],
            [
                'name' => 'Pengembangan Perangkat Lunak & Gim',
                'short_name' => 'PPLG',
                'slug' => 'pplg',
                'description' => 'Membentuk software engineer handal yang menguasai algoritma pemrograman, perancangan basis data, pengembangan web responsif, aplikasi mobile Android/iOS, kecerdasan buatan (AI), serta pengembangan gim digital interaktif.',
                'advantages' => 'Sertifikasi BNSP Rekayasa Perangkat Lunak, kurikulum industri Huawei ICT Academy, Teaching Factory Software House.',
                'career_prospects' => 'Machine Learning Engineer, Data Analyst, Cyber Security Specialist, System Designer, IoT Engineer, Programmer, Database Administrator, Web Developer, Mobile Programmer.',
                'image_url' => '/assets/images/270415770316c24e71c5983a5cb91e6077926523.jpg',
                'order' => 2,
            ],
            [
                'name' => 'Pemasaran (Bisnis Digital)',
                'short_name' => 'PM/BD',
                'slug' => 'pemasaran',
                'description' => 'Program keahlian yang memadukan strategi pemasaran modern, bisnis digital, e-commerce, live streaming selling, optimasi mesin pencari (SEO), dan pengelolaan periklanan digital di era industri 4.0.',
                'advantages' => 'Laboratorium Studio Podcast & Live Streaming, Sertifikasi Digital Marketing BNSP, Kemitraan Marketplace & Retail Modern.',
                'career_prospects' => 'Content Creator, Admin Social Media, Social Media Marketing, Ads Manager, Marketing Manager, SEO Specialist, Host Live Streamer, AI Business Analyst, Entrepreneur.',
                'image_url' => '/assets/images/9beb4e8862a9ee5d6dc2acf0b015879e6f91bb58.jpg',
                'order' => 3,
            ],
            [
                'name' => 'Perhotelan',
                'short_name' => 'HTL',
                'slug' => 'perhotelan',
                'description' => 'Mencetak tenaga profesional di industri perhotelan dan hospitality internasional dengan standar layanan prima, sanitasi hygiene, tata graha (housekeeping), pelayanan makanan & minuman (F&B), serta etika kerja unggul.',
                'advantages' => 'Hotel Edukasi / Praktek Mandiri, Sertifikasi Kompetensi Perhotelan Internasional, Kerjasama Hotel Berbintang Bintang 4 & 5.',
                'career_prospects' => 'Guest relationship officer, Call Center, Front Office, Room & Public Area Attendant, Laundry & Linen Staff, Outlite Cashier, Steward, Room Service, Receptionist, Waiter-Waitress Attendant, Chef F&B Product.',
                'image_url' => '/assets/images/Hotel.png',
                'order' => 4,
            ],
        ];

        foreach ($majors as $m) {
            Major::updateOrCreate(['slug' => $m['slug']], $m);
        }

        // 6. Prestasi (Achievements) Resmi
        $achievements = [
            [
                'title' => 'Juara 2 Nasional Lomba Pangan Jajan Sehat Anak Usia Sekolah',
                'slug' => 'juara-2-nasional-pangan-jajan-sehat',
                'category' => 'Tingkat Nasional',
                'recipient_name' => 'SMK Wikrama 1 Garut',
                'rank' => 'Juara 2 Nasional',
                'event_year' => '2024',
                'description' => 'Penghargaan bergengsi tingkat nasional atas komitmen sekolah dalam mewujudkan kantin sehat dan higienis ramah lingkungan bagi seluruh siswa.',
                'image_url' => '/assets/images/2075806e32858ea6928fd608423c97dd2955b453-1024x870.png',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Medali Emas & Perak di Olimpiade Sains Siswa Nasional 2.0',
                'slug' => 'medali-emas-perak-olimpiade-sains-siswa-nasional-2-0',
                'category' => 'Tingkat Nasional',
                'recipient_name' => 'Tim Olimpiade Sains Wikrama',
                'rank' => 'Medali Emas & Perak',
                'event_year' => '2025',
                'description' => 'Siswa SMK Wikrama 1 Garut berhasil membawa pulang medali emas dan perak di bidang sains teknologi terapan tingkat nasional.',
                'image_url' => '/assets/images/downloadgram.org_590573023_18400070119130368_5646484177552236084_n-819x1024.jpg',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Dua Siswa Lolos Seleksi Program Beasiswa Pendidikan Luar Negeri',
                'slug' => 'dua-siswa-lolos-beasiswa-luar-negeri',
                'category' => 'Internasional',
                'recipient_name' => 'Siswa Berprestasi Wikrama',
                'rank' => 'Penerima Beasiswa',
                'event_year' => '2025',
                'description' => 'Dua siswa berprestasi lulus seleksi ketat program vokasi internasional untuk melanjutkan studi dan magang di luar negeri.',
                'image_url' => '/assets/images/591159997_2707082836311063_3975242320751435201_n-577x1024.jpg',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'title' => 'Penghargaan WORLDDIDAC ASIA 2025',
                'slug' => 'penghargaan-worlddidac-asia-2025',
                'category' => 'Internasional',
                'recipient_name' => 'SMK Wikrama 1 Garut',
                'rank' => 'Excellence Award',
                'event_year' => '2025',
                'description' => 'Apresiasi internasional atas inovasi pembelajaran vokasi berbasis teknologi digital terapan terdepan di Asia Tenggara.',
                'image_url' => '/assets/images/image-26.png',
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'title' => 'Sekolah Sehat & Ramah Lingkungan Kemenkes RI',
                'slug' => 'sekolah-sehat-kemenkes-ri',
                'category' => 'Tingkat Nasional',
                'recipient_name' => 'SMK Wikrama 1 Garut',
                'rank' => 'Predikat Unggul',
                'event_year' => '2024',
                'description' => 'Penetapan sekolah rujukan pembiasaan hidup bersih, sehat, bebas sampah plastik, dan lingkungan hijau berkelanjutan.',
                'image_url' => '/assets/images/image-27.png',
                'is_featured' => true,
                'order' => 5,
            ],
            [
                'title' => 'Akreditasi A+ (Unggul) BAN-PDM',
                'slug' => 'akreditasi-a-plus-ban-pdm',
                'category' => 'Standar Mutu Nasional',
                'recipient_name' => 'SMK Wikrama 1 Garut',
                'rank' => 'Akreditasi A+',
                'event_year' => '2024',
                'description' => 'Akreditasi tertinggi dari Badan Akreditasi Nasional Pendidikan Dasar dan Menengah atas pemenuhan seluruh 8 Standar Nasional Pendidikan.',
                'image_url' => '/assets/images/image-28.png',
                'is_featured' => true,
                'order' => 6,
            ],
        ];

        foreach ($achievements as $ach) {
            Achievement::updateOrCreate(['slug' => $ach['slug']], $ach);
        }

        // 7. Galeri Foto & Dokumentasi
        $galleries = [
            [
                'title' => 'Gedung & Kampus SMK Wikrama 1 Garut',
                'category' => 'Gedung',
                'image_url' => '/assets/images/spmb/Gedung.jpg',
                'caption' => 'Suasana kampus asri, sejuk, dan modern di kawasan Tarogong Kaler, Garut.',
                'order' => 1,
            ],
            [
                'title' => 'Laboratorium TJKT & Cisco Networking',
                'category' => 'Fasilitas',
                'image_url' => '/assets/images/Ruang-TJKT-Compress-1024x768.jpeg',
                'caption' => 'Peralatan praktikum jaringan komputer dan server rack standar industri.',
                'order' => 2,
            ],
            [
                'title' => 'Studio Coding PPLG & Rekayasa Perangkat Lunak',
                'category' => 'Fasilitas',
                'image_url' => '/assets/images/73fb957f607cff6d28e5ff961eb82b52ddcb83e3-1-1024x768.jpg',
                'caption' => 'Suasana santai dan produktif dalam pengembangan sistem software house.',
                'order' => 3,
            ],
            [
                'title' => 'Hotel Edukasi & Praktek Housekeeping HTL',
                'category' => 'Fasilitas',
                'image_url' => '/assets/images/Hotel.png',
                'caption' => 'Kamar mock-up berstandar hotel berbintang untuk pelatihan keterampilan tamu.',
                'order' => 4,
            ],
            [
                'title' => 'Kegiatan Pembiasaan Shalat Berjamaah',
                'category' => 'Budaya & Karakter',
                'image_url' => '/assets/images/179cf0b96d661d53003f330d057d2f3f12679201-1-1024x682.jpg',
                'caption' => 'Pembinaan akhlakul karimah dan ibadah shalat berjamaah tepat waktu.',
                'order' => 5,
            ],
            [
                'title' => 'Penerapan 7 Kebiasaan Efektif (7 Habits)',
                'category' => 'Budaya & Karakter',
                'image_url' => '/assets/images/558651258_18389940643130368_6632104292343839978_n.jpg',
                'caption' => 'Metode pembelajaran proaktif yang membentuk kepemimpinan siswa.',
                'order' => 6,
            ],
            [
                'title' => 'Belajar Bertiga (Peer Tutoring)',
                'category' => 'Kegiatan Siswa',
                'image_url' => '/assets/images/e3bcbf6c79a441d4098422af6489473116861a60-1024x683.jpg',
                'caption' => 'Kolaborasi antar siswa dalam menyelesaikan studi kasus kejuruan.',
                'order' => 7,
            ],
        ];

        foreach ($galleries as $gal) {
            Gallery::updateOrCreate(['title' => $gal['title']], $gal);
        }

        // 8. Testimoni Alumni (spmb.html)
        $testimonials = [
            [
                'name' => 'Akhmad Munito',
                'graduation_year' => '2000',
                'major' => 'Administrasi Perkantoran (APK)',
                'quote' => 'Maju Terus Wikrama, dengan sekolah di Wikrama saya dibekali ilmu yg sangat bermanfaat dan akhlakul karimah bisa langsung bisa bersaing ke dunia kerja di era modern ini.',
                'photo_url' => '/assets/images/spmb/logo.png',
                'company' => 'Praktisi Profesional',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Kamaludin',
                'graduation_year' => '2016',
                'major' => 'Rekayasa Perangkat Lunak (RPL)',
                'quote' => 'Menerapkan sistem pembelajaran yang baik, efektif dan berbasis TI yang sangat memudahkan siswa.',
                'photo_url' => '/assets/images/spmb/logo.png',
                'company' => 'Software Engineer',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Lutfi Hakim',
                'graduation_year' => '2011',
                'major' => 'Rekayasa Perangkat Lunak (RPL)',
                'quote' => 'SMK Wikrama bukan hanya menjadikan siswanya untuk masuk ke dunia kerja, melainkan melebihi dari apa yang dibutuhkan di dunia kerja pada umumnya.',
                'photo_url' => '/assets/images/spmb/logo.png',
                'company' => 'Senior Tech Specialist',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['name' => $t['name']], $t);
        }

        // 9. Rapor Pendidikan Resmi (Kemdikbudristek)
        $reports = [
            [
                'indicator_name' => 'Kompetensi literasi siswa (Peringkat atas 1-20% nasional)',
                'score' => 98.00,
                'status' => 'Sangat Baik',
                'notes' => 'Menduduki ranking 20% teratas tingkat nasional.',
                'year' => '2024/2025',
                'order' => 1,
            ],
            [
                'indicator_name' => 'Numerasi (Masuk peringkat atas Nasional)',
                'score' => 91.00,
                'status' => 'Sangat Baik',
                'notes' => 'Pencapaian kemampuan nalar matematika siswa melampaui rata-rata provinsi.',
                'year' => '2024/2025',
                'order' => 2,
            ],
            [
                'indicator_name' => 'Karakter (Masuk peringkat atas Nasional)',
                'score' => 95.00,
                'status' => 'Sangat Baik',
                'notes' => 'Pembiasaan nilai Pancasila, keagamaan, kejujuran, dan kemandirian.',
                'year' => '2024/2025',
                'order' => 3,
            ],
            [
                'indicator_name' => 'Kualitas pembelajaran (Masuk peringkat atas Nasional)',
                'score' => 90.00,
                'status' => 'Sangat Baik',
                'notes' => 'Metode pembelajaran aktif, relevan dengan dunia kerja, dan inovatif.',
                'year' => '2024/2025',
                'order' => 4,
            ],
            [
                'indicator_name' => 'Penyerapan lulusan (Masuk peringkat atas Nasional)',
                'score' => 96.00,
                'status' => 'Sangat Baik',
                'notes' => 'Tingkat kebekerjaan dan wirausaha lulusan dalam 6 bulan setelah kelulusan.',
                'year' => '2024/2025',
                'order' => 5,
            ],
        ];

        foreach ($reports as $r) {
            EducationReport::updateOrCreate(['indicator_name' => $r['indicator_name']], $r);
        }

        // 10. Budaya Sekolah
        $cultures = [
            [
                'title' => 'Program Matrikulasi',
                'description' => 'Program penyetaraan dasar karakter dan kompetensi teknologi bagi seluruh siswa baru sebelum memulai kegiatan pembelajaran reguler.',
                'icon' => 'ri-compass-3-line',
                'image_url' => '/assets/images/Ruang-TJKT-Compress-1024x768.jpeg',
            ],
            [
                'title' => 'Moving Class',
                'description' => 'Sistem kelas bergerak yang dinamis membuat siswa aktif berpindah ruang laboratorium sesuai mata pelajaran, menciptakan suasana kampus profesional.',
                'icon' => 'ri-arrow-left-right-line',
                'image_url' => '/assets/images/73fb957f607cff6d28e5ff961eb82b52ddcb83e3-1-1024x768.jpg',
            ],
            [
                'title' => 'Sistem Belajar Bertiga',
                'description' => 'Metode kolaboratif peer tutoring dalam kelompok kecil yang memacu daya kritis, saling melengkapi, dan memupuk kepedulian antar sesama.',
                'icon' => 'ri-team-line',
                'image_url' => '/assets/images/e3bcbf6c79a441d4098422af6489473116861a60-1024x683.jpg',
            ],
            [
                'title' => '7 Kebiasaan Efektif (7 Habits)',
                'description' => 'Penerapan kebiasaan sukses: Proaktif, Menentukan Tujuan Akhir, Dahulukan yang Utama, Berpikir Menang-Menang, Sinergi, dan Mengasah Diri.',
                'icon' => 'ri-award-line',
                'image_url' => '/assets/images/558651258_18389940643130368_6632104292343839978_n.jpg',
            ],
            [
                'title' => 'Shalat Berjamaah & Akhlaq Islami',
                'description' => 'Pembiasaan ibadah shalat wajib berjamaah tepat waktu, dhuha, tadarus Al-Qur\'an, dan pembinaan adab santun harian.',
                'icon' => 'ri-heart-line',
                'image_url' => '/assets/images/179cf0b96d661d53003f330d057d2f3f12679201-1-1024x682.jpg',
            ],
        ];

        foreach ($cultures as $c) {
            SchoolCulture::updateOrCreate(['title' => $c['title']], $c);
        }

        // 11. Fasilitas & Sarpras
        $facilities = [
            [
                'name' => 'Laboratorium TJKT & Cisco Networking',
                'description' => 'Ruang praktik jaringan komputer dengan switch, router mikrotik, server rack, dan perangkat fiber optik terstandardisasi.',
                'image_url' => '/assets/images/Ruang-TJKT-Compress-1024x768.jpeg',
                'category' => 'Laboratorium',
            ],
            [
                'name' => 'Studio Komputer & PPLG Coding Room',
                'description' => 'Laboratorium ber-AC dengan workstation spesifikasi tinggi untuk pengembangan aplikasi web, mobile, dan kecerdasan buatan.',
                'image_url' => '/assets/images/73fb957f607cff6d28e5ff961eb82b52ddcb83e3-1-1024x768.jpg',
                'category' => 'Laboratorium',
            ],
            [
                'name' => 'Smart Classroom & Ruang Belajar',
                'description' => 'Ruang kelas bersih, nyaman, berorientasi alam dengan teknologi proyektor cerdas dan koneksi internet serat optik kecepatan tinggi.',
                'image_url' => '/assets/images/179cf0b96d661d53003f330d057d2f3f12679201-1-1024x682.jpg',
                'category' => 'Ruang Teori',
            ],
            [
                'name' => 'Hotel Edukasi & Praktek Perhotelan',
                'description' => 'Mini hotel dan kamar mock-up berstandar bintang untuk melatih keterampilan housekeeping dan front office siswa.',
                'image_url' => '/assets/images/Hotel.png',
                'category' => 'Hospitality',
            ],
        ];

        foreach ($facilities as $f) {
            Facility::updateOrCreate(['name' => $f['name']], $f);
        }

        // 12. Partners & Mitra
        $partners = [
            ['name' => 'Juara 2 Nasional Pangan Jajan Sehat', 'logo_url' => '/assets/images/2075806e32858ea6928fd608423c97dd2955b453-1024x870.png', 'website' => '#'],
            ['name' => 'WORLDDIDAC ASIA 2025', 'logo_url' => '/assets/images/image-26.png', 'website' => '#'],
            ['name' => 'Sekolah Sehat Kemenkes RI', 'logo_url' => '/assets/images/image-27.png', 'website' => '#'],
            ['name' => 'BBPPMPV Mesin & Industri', 'logo_url' => '/assets/images/image-31.png', 'website' => '#'],
            ['name' => 'IDS Rumah Pendidikan', 'logo_url' => '/assets/images/image-31-1.png', 'website' => '#'],
            ['name' => 'Akreditasi A+ BAN-PDM', 'logo_url' => '/assets/images/image-28.png', 'website' => '#'],
            ['name' => 'Huawei ICT Academy', 'logo_url' => '/assets/images/image-29.png', 'website' => '#'],
            ['name' => 'Mikrotik Academy', 'logo_url' => '/assets/images/45877038logomta.jpeg', 'website' => '#'],
            ['name' => 'EC-Council Academia Partner', 'logo_url' => '/assets/images/EC-Council-Academia-Partner-logo.png', 'website' => '#'],
            ['name' => 'Sekolah Sasaran Teaching Factory', 'logo_url' => '/assets/images/image-31-2.png', 'website' => '#'],
            ['name' => 'SMK Pusat Keunggulan', 'logo_url' => '/assets/images/Logo-SMK-Pusat-Keunggulan-SMK-PK.png', 'website' => '#'],
            ['name' => 'Binus University', 'logo_url' => '/assets/images/Binus-University.png', 'website' => 'https://binus.ac.id'],
            ['name' => 'ITB University', 'logo_url' => '/assets/images/ITB-University.png', 'website' => 'https://itb.ac.id'],
            ['name' => 'Universitas Indonesia', 'logo_url' => '/assets/images/UI-Universitas-Indonesia-Logo-Koleksilogo.com_.png', 'website' => 'https://ui.ac.id'],
            ['name' => 'IPB University', 'logo_url' => '/assets/images/Logo_IPB.png', 'website' => 'https://ipb.ac.id'],
            ['name' => 'Telkom University', 'logo_url' => '/assets/images/Logo_Telkom_University_potrait.png', 'website' => 'https://telkomuniversity.ac.id'],
            ['name' => 'Institut Pendidikan Indonesia', 'logo_url' => '/assets/images/Insitut-Pendidikan-Indonesia.png', 'website' => '#'],
            ['name' => 'Universitas Mercu Buana', 'logo_url' => '/assets/images/lg-65bdba294381b-Universitas-Mercu-Buana.webp', 'website' => '#'],
            ['name' => 'Universitas Pendidikan Indonesia', 'logo_url' => '/assets/images/lg-65cfc4b795abb-Universitas-Pendidikan-Indones.webp', 'website' => '#'],
        ];

        foreach ($partners as $p) {
            Partner::updateOrCreate(['name' => $p['name']], $p);
        }

        // 13. Berita & Informasi
        $newsItems = [
            [
                'title' => 'SMK Wikrama 1 Garut Terima Kunjungan Studi Tiru dari MIN 17 Kepulauan Seribu Jakarta',
                'slug' => 'smk-wikrama-1-garut-terima-kunjungan-studi-tiru-dari-min-17-kepulauan-seribu-jakarta',
                'content' => 'SMK Wikrama 1 Garut menyambut hangat delegasi studi tiru dari MIN 17 Kepulauan Seribu Jakarta. Kunjungan ini berfokus pada pertukaran praktik baik dalam pengelolaan sekolah ramah lingkungan, integrasi teknologi dalam manajemen sekolah, serta penanaman karakter dan akhlaq karimah bagi seluruh warga sekolah.',
                'image_url' => '/assets/images/IMG_5026-1-819x1024.png',
                'category' => 'Kegiatan Sekolah',
                'author' => 'Humas Wikrama',
                'published_at' => '2026-01-14 08:00:00',
                'is_published' => true,
            ],
            [
                'title' => 'Lulusan SMK Wikrama 1 Garut Siap Kerja di Industri Perhotelan Dalam dan Luar Negeri',
                'slug' => 'lulusan-smk-wikrama-1-garut-siap-kerja-di-industri-perhotelan-dalam-dan-luar-negeri',
                'content' => 'Kiprah lulusan kompetensi keahlian Perhotelan SMK Wikrama 1 Garut kian diakui oleh mitra industri nasional dan internasional. Berbekal sertifikasi kompetensi berstandar global, para siswa telah menembus peluang karir di jaringan hotel berbintang 4 dan 5 di dalam maupun luar negeri.',
                'image_url' => '/assets/images/599876085_18400529680130368_3130144425626853537_n-576x1024.jpg',
                'category' => 'Prestasi & Karir',
                'author' => 'BKK Wikrama',
                'published_at' => '2025-12-13 09:30:00',
                'is_published' => true,
            ],
            [
                'title' => 'SMK Wikrama 1 Garut Raih Medali Emas & Perak di Olimpiade Sains Siswa Nasional 2.0',
                'slug' => 'smk-wikrama-1-garut-raih-medali-emas-perak-di-olimpiade-sains-siswa-nasional-2-0',
                'content' => 'Prestasi membanggakan kembali ditorehkan oleh siswa-siswi SMK Wikrama 1 Garut di ajang Olimpiade Sains Siswa Nasional 2.0. Dengan persiapan matang dan bimbingan intensif dewan guru, delegasi Wikrama sukses membawa pulang medali emas dan perak di bidang Teknologi Informasi dan Sains Terapan.',
                'image_url' => '/assets/images/downloadgram.org_590573023_18400070119130368_5646484177552236084_n-819x1024.jpg',
                'category' => 'Prestasi',
                'author' => 'Tim Kesiswaan',
                'published_at' => '2025-12-10 10:15:00',
                'is_published' => true,
            ],
            [
                'title' => 'Dua Siswa SMK Wikrama 1 Garut Lolos Seleksi Program Beasiswa Pendidikan ke Luar Negeri',
                'slug' => 'dua-siswa-smk-wikrama-1-garut-lolos-seleksi-program-beasiswa-pendidikan-ke-luar-negeri',
                'content' => 'Dua siswa berprestasi SMK Wikrama 1 Garut berhasil lolos seleksi ketat program beasiswa pendidikan vokasi internasional. Keberhasilan ini membuktikan komitmen sekolah dalam mencetak generasi muda yang berakhlak mulia, berilmu amaliah, dan berdaya saing global.',
                'image_url' => '/assets/images/591159997_2707082836311063_3975242320751435201_n-577x1024.jpg',
                'category' => 'Prestasi',
                'author' => 'Humas Wikrama',
                'published_at' => '2025-11-28 14:00:00',
                'is_published' => true,
            ],
        ];

        foreach ($newsItems as $n) {
            News::updateOrCreate(['slug' => $n['slug']], $n);
        }

        $this->call(TeacherSeeder::class);
    }
}
