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

$sql = "UPDATE maps SET 
        nama_lokasi = '$nama_lokasi', 
        deskripsi_lokasi = '$deskripsi_lokasi', 
        kategori_lokasi = '$kategori_lokasi', 
        jam_buka = '$jam_buka', 
        jam_tutup = '$jam_tutup', 
        kontak_lokasi = '$kontak_lokasi'
        WHERE latitude = '$lat' AND longitude = '$lng'" ;

if ($conn->query($sql) === TRUE) {
    echo "Data POI berhasil diperbarui";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
