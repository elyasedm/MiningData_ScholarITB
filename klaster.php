<?php
include("require.php");
$type = "1";
$msg = "";
$judul_msg = '404';
$tombol = 'Ok!';
$judul = "Google Scholar ITB";
$content = Layout::Klaster();
echo Layout::Page($judul, $msg, $judul_msg, $type, $tombol, $content);
