<?php
$f = "app/Http/Controllers/FrontendController.php";
$c = file_get_contents($f);
$c = str_replace("view('home'", "view('beranda'", $c);
$c = str_replace("view('spmb'", "view('pendaftaran'", $c);
$c = str_replace("view('majors'", "view('kompetensi_keahlian'", $c);
$c = str_replace("view('major-detail'", "view('major-detail'", $c); // I didn't rename this one
$c = str_replace("view('resources'", "view('sumber_daya'", $c);
$c = str_replace("view('culture'", "view('budaya'", $c);
$c = str_replace("view('news'", "view('berita'", $c);
$c = str_replace("view('news-detail'", "view('news-detail'", $c); // Didn't rename this
$c = str_replace("view('about'", "view('tentang_kami'", $c);
file_put_contents($f, $c);
echo "Done";

