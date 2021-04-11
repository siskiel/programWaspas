<?php

$koneksi->query("DELETE FROM penilaian WHERE id_calon_komandan='".$_GET['id_calon_komandan']."'");

echo "<script>alert('Data berhasil dihapus secara permanen.');</script>";
echo "<script>location='index.php?halaman=penilaian';</script>";
?>