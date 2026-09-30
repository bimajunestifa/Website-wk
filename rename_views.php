<?php
$viewsDir = __DIR__ . "/resources/views/";
$map = [
    "home.blade.php" => "beranda.blade.php",
    "about.blade.php" => "tentang_kami.blade.php",
    "culture.blade.php" => "budaya.blade.php",
    "majors.blade.php" => "kompetensi_keahlian.blade.php",
    "news.blade.php" => "berita.blade.php",
    "resources.blade.php" => "sumber_daya.blade.php",
    "spmb.blade.php" => "pendaftaran.blade.php"
];

foreach ($map as $old => $new) {
    if (file_exists($viewsDir . $old)) {
        rename($viewsDir . $old, $viewsDir . $new);
        echo "Renamed $old to $new\n";
    }
}

