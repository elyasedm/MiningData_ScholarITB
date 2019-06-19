<?php
include("./require.php");

if (isset($_GET['search'])) {
    if (strlen($_GET['search']) >= 1) {
        $type = "1";
        $msg = "";
        $judul_msg = '404';
        $tombol = 'Ok!';
        $judul = "Search";
        $content = Layout::Pencarian($_GET['search']);
        echo Layout::Page($judul, $msg, $judul_msg, $type, $tombol, $content);
    } else {
        $content = "Swal.fire({
            title: '204!',
            text: 'Pencarian tanpa kunci',
            type: 'warning',
            confirmButtonText: 'Ok!'
          })";
        setcookie('notif', $content, time() + 1, '/', null, null, null);
        redirect('./');
    }
} else {
    $content = "Swal.fire({
        title: '204!',
        text: 'Pencarian tanpa kunci',
        type: 'warning',
        confirmButtonText: 'Ok!'
      })";
    setcookie('notif', $content, time() + 1, '/', null, null, null);
    redirect('./');
}
