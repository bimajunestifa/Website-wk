<?php
$f = "resources/views/home.blade.php";
$c = file_get_contents($f);
$c = str_replace(
    "<div class=\"e-con-inner\">\r\n<div class=\"elementor-element elementor-element-e908163",
    "<div class=\"e-con-inner\">\n<style>\n.elementor-element-e908163 > .elementor-element { margin-top: 0 !important; width: calc(50% - 15px) !important; flex: 0 0 calc(50% - 15px) !important; min-width: 280px !important; }\n</style>\n<div class=\"elementor-element elementor-element-e908163",
    $c
);
$c = str_replace(
    "<div class=\"e-con-inner\">\n<div class=\"elementor-element elementor-element-e908163",
    "<div class=\"e-con-inner\">\n<style>\n.elementor-element-e908163 > .elementor-element { margin-top: 0 !important; width: calc(50% - 15px) !important; flex: 0 0 calc(50% - 15px) !important; min-width: 280px !important; }\n</style>\n<div class=\"elementor-element elementor-element-e908163",
    $c
);
file_put_contents($f, $c);
echo "Done";

