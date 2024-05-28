<?php
include 'koneksi.php';

$sql = "SELECT * FROM maps";
$result = $conn->query($sql);

$markers = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $markers[] = array(
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'nama_lokasi' => $row['nama_lokasi'],
            'deskripsi_lokasi' => $row['deskripsi_lokasi'],
            'kategori_lokasi' => $row['kategori_lokasi'],
            'jam_buka' => $row['jam_buka'],
            'jam_tutup' => $row['jam_tutup'],
            'kontak_lokasi' => $row['kontak_lokasi'],
        );
    }
}

echo json_encode($markers);

$conn->close();

