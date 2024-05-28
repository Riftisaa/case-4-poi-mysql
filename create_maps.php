<?php
include 'koneksi.php';

$lat = $_POST['lat'];
$lng = $_POST['lng'];
$nama_lokasi = $_POST['nama_lokasi'];
$deskripsi_lokasi = $_POST['deskripsi_lokasi'];
$kategori_lokasi = $_POST['kategori_lokasi'];
$jam_buka = $_POST['jam_buka'];
$jam_tutup = $_POST['jam_tutup'];
$kontak_lokasi = $_POST['kontak_lokasi'];

$sql = "INSERT INTO maps (latitude, longitude, nama_lokasi, deskripsi_lokasi, kategori_lokasi, jam_buka, jam_tutup, kontak_lokasi) 
        VALUES ('$lat', '$lng', '$nama_lokasi', '$deskripsi_lokasi', '$kategori_lokasi', '$jam_buka', '$jam_tutup', '$kontak_lokasi')";


if ($conn->query($sql) === TRUE) {
    echo "Data POI berhasil disimpan cuy";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

