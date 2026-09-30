<?php
require __DIR__ . "/vendor/autoload.php";
$app = require_once __DIR__ . "/bootstrap/app.php";
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Partner;

$updates = [
    1 => ["badge_text" => "Juara 2 Nasional", "description" => "Pangan Jajan Anak Sehat Regional Barat"],
    2 => ["badge_text" => "WORLDDIDAC ASIA 2025", "description" => "Kategori Innovation in Digital Education Development"],
    3 => ["badge_text" => "Tersertifikasi Sekolah Sehat", "description" => "Kementrian Kesehatan"],
    4 => ["badge_text" => "Pusat Belajar", "description" => "BBPPMPV Bidang Mesin dan Teknik Industri"],
    5 => ["badge_text" => "IDS Rumah Pendidikan Indonesia", "description" => "Sebagai konsultan pendidikan"],
    6 => ["badge_text" => "Akreditasi A+", "description" => "Badan Akreditasi Nasional - PDM"],
    7 => ["badge_text" => "Huawei ICT Academy", "description" => "Partner bidang Artificial Intelegence"],
    8 => ["badge_text" => "Mikrotik Academy", "description" => "MikroTik Certified Network Associate"],
    9 => ["badge_text" => "EC-Council Academia", "description" => "Kurikulum & Sertifikasi Cyber Security"],
    10 => ["badge_text" => "Sekolah Sasaran Teaching Factory", "description" => "Direktorat Kemitraan dan Penyelarasan DUDI"],
    39 => ["badge_text" => "Kejar.id", "description" => "Sebagai tool manajemen berbasis data & LMS"],
    11 => ["badge_text" => "Sekolah Pusat Keunggulan", "description" => "Kemdikdasmen 2025"],
    26 => ["badge_text" => "Teaching Factory", "description" => "Pembelajaran berbasis pabrik bernilai ekonomi"],
];

foreach ($updates as $id => $data) {
    Partner::where("id", $id)->update($data);
}
echo "Updated partners\n";

