<?php
require __DIR__ . "/vendor/autoload.php";
$app = require_once __DIR__ . "/bootstrap/app.php";
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\HomeFeatureCard;

$updates = [
    ["title" => "Juara 2 Nasional", "description" => "Pangan Jajan Anak Sehat Regional Barat", "image_url" => "/assets/images/2075806e32858ea6928fd608423c97dd2955b453-1024x870.png"],
    ["title" => "WORLDDIDAC ASIA 2025", "description" => "Kategori Innovation in Digital Education Development", "image_url" => "/assets/images/image-26.png"],
    ["title" => "Tersertifikasi Sekolah Sehat", "description" => "Kementrian Kesehatan", "image_url" => "/assets/images/image-27.png"],
    ["title" => "Pusat Belajar", "description" => "BBPPMPV Bidang Mesin dan Teknik Industri", "image_url" => "/assets/images/image-31.png"],
    ["title" => "IDS Rumah Pendidikan Indonesia", "description" => "Sebagai konsultan pendidikan", "image_url" => "/assets/images/image-31-1.png"],
    ["title" => "Akreditasi A+", "description" => "Badan Akreditasi Nasional - PDM", "image_url" => "/assets/images/image-28.png"],
    ["title" => "Huawei ICT Academy", "description" => "Partner bidang Artificial Intelegence", "image_url" => "/assets/images/image-29.png"],
    ["title" => "Mikrotik Academy", "description" => "MikroTik Certified Network Associate", "image_url" => "/assets/images/45877038logomta.jpeg"],
    ["title" => "EC-Council Academia", "description" => "Kurikulum & Sertifikasi Cyber Security", "image_url" => "/assets/images/EC-Council-Academia-Partner-logo.png"],
    ["title" => "Sekolah Sasaran Teaching Factory", "description" => "Direktorat Kemitraan dan Penyelarasan DUDI", "image_url" => "/assets/images/image-31-2.png"],
    ["title" => "Kejar.id", "description" => "Sebagai tool manajemen berbasis data & LMS", "image_url" => "http://localhost:8000/storage/partners/93DIKHirDvxdg3D3G6GPH0ElKmjq6fQaS4L615jJ.png"],
    ["title" => "Sekolah Pusat Keunggulan", "description" => "Kemdikdasmen 2025", "image_url" => "/assets/images/Logo-SMK-Pusat-Keunggulan-SMK-PK.png"],
    ["title" => "Amazon Web Services Educate", "description" => "Sertification Partner", "image_url" => "/assets/images/image-33.png"],
    ["title" => "Google Workspace", "description" => "Pengelolaan Administrasi secara cloud", "image_url" => "/assets/images/image-1.png"],
    ["title" => "Teaching Factory", "description" => "Pembelajaran berbasis pabrik bernilai ekonomi", "image_url" => "/assets/images/Screenshot-2025-10-13-221715.png"],
];

HomeFeatureCard::where("section", "teladan")->delete();

$order = 1;
foreach ($updates as $data) {
    HomeFeatureCard::create([
        "section" => "teladan",
        "title" => $data["title"],
        "description" => $data["description"],
        "image_url" => $data["image_url"],
        "order" => $order++,
        "is_active" => true
    ]);
}
echo "Seeded teladans\n";

