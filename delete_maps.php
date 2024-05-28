<?php
include 'koneksi.php';

$lat = $_POST['lat'];
$lng = $_POST['lng'];

$sql = "DELETE FROM maps
        WHERE 
            latitude = '$lat' and longitude = '$lng'";

if ($conn->query($sql) === TRUE) {
    echo "Data POI berhasil diperbarui";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();