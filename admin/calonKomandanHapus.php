<?php

$ambil = $koneksi->query("SELECT * FROM calon_komandan WHERE id_calon_komandan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM calon_komandan WHERE id_calon_komandan='$_GET[id]'");

echo "<script>alert('Apakah Ingin menghapus Calon Komandan? ');</script>";
echo "<script>location='index.php?halaman=calonKomandan';</script>";
?>