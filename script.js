
$( document ).on('ready',(function() {
    read_maps();
}));

var map = L.map('map', { contextmenu: true }).setView([-7.953781517052829, 112.61299313569837], 12);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
}).addTo(map);


map.on('click', function (e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;

    var marker = L.marker([lat,lng]).addTo(map);
    $('#nama_lokasi').val('');
    $('#deskripsi_lokasi').val('');
    $('#kategori_lokasi').val('');
    $('#jam_buka').val('');
    $('#jam_tutup').val('');
    $('#kontak_lokasi').val('');
        $('#poiModal').modal('show');
        $('#simpanPOI').on("click",(function() {
            var nama_lokasi = $('#nama_lokasi').val();
            var deskripsi_lokasi = $('#deskripsi_lokasi').val();
            var kategori_lokasi = $('#kategori_lokasi').val();
            var jam_buka = $('#jam_buka').val();
            var jam_tutup = $('#jam_tutup').val();
            var kontak_lokasi = $('#kontak_lokasi').val();

            $.ajax({
                url: 'create_maps.php',
                type: 'POST',
                data: {
                    lat: lat,
                    lng: lng,
                    nama_lokasi: nama_lokasi,
                    deskripsi_lokasi: deskripsi_lokasi,
                    kategori_lokasi: kategori_lokasi,
                    jam_buka: jam_buka,
                    jam_tutup: jam_tutup,
                    kontak_lokasi: kontak_lokasi
                },
                success: function(response) {
                    console.log(response);
                    marker.bindPopup('<b>' + nama_lokasi + '</b><br>' + deskripsi_lokasi).openPopup();
                    read_maps();
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan:', error);
                }
            });

            $('#poiModal').modal('hide');
        }));

});





function createPopupContent(marker) {
    var content = '<h3>' + marker.nama_lokasi + '</h3>';
    content += '<p><strong>Latitude:</strong> ' + marker.latitude + '</p>';
    content += '<p><strong>Longitude:</strong> ' + marker.longitude + '</p>';
    content += '<p><strong>Deskripsi:</strong> ' + marker.deskripsi_lokasi + '</p>';
    content += '<p><strong>Kategori:</strong> ' + marker.kategori_lokasi + '</p>';
    content += '<p><strong>Jam Buka:</strong> ' + marker.jam_buka + '</p>';
    content += '<p><strong>Jam Tutup:</strong> ' + marker.jam_tutup + '</p>';
    content += '<p><strong>Kontak:</strong> ' + marker.kontak_lokasi + '</p>';
    return content;
}

function read_maps(){
$.ajax({
    url: 'read_maps.php',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
        $.each(data, function (index, marker) {
            var popupContent = createPopupContent(marker);
            var newMarker = L.marker([marker.latitude, marker.longitude]).addTo(map).bindPopup(popupContent).openPopup();
            newMarker.on('contextmenu', function(e) {
            hapusDataPOI(marker.latitude);
            });
        });
    },
    error: function (xhr, status, error) {
        console.error('Error:', error);
    }
});
}