<?php
$f = "resources/views/beranda.blade.php";
$c = file_get_contents($f);
$c = preg_replace("/<style>\s*\.elementor-element-e908163 > \.elementor-element \{ margin-top: 0 !important; width: calc\(50% - 15px\) !important; flex: 0 0 calc\(50% - 15px\) !important; min-width: 280px !important; \}\s*<\/style>\s*/i", "", $c);
file_put_contents($f, $c);
echo "Done";

