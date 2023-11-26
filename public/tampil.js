
    $(document).ready(function () {
        // Lakukan permintaan AJAX
        $.ajax({
            url: 'http://127.0.0.1:8000/api/barang', // Ganti dengan URL API yang sesuai
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                // Proses data yang diterima dari API
                if (response.status) {
                    var dataHtml = '<ul>';
                    $.each(response.data, function (index, item) {
                        // Tampilkan hanya kolom 'nama', 'harga', dan 'jumlah'
                        dataHtml += '<li>Nama: ' + item.nama + ', Harga: ' + item.harga + ', Jumlah: ' + item.jumlah + '</li>';
                    });
                    dataHtml += '</ul>';

                    // Tampilkan hasil dalam elemen dengan id 'result'
                    $('#result').html(dataHtml);
                } else {
                    $('#result').html('Data tidak ditemukan');
                }
            },
            error: function () {
                $('#result').html('Terjadi kesalahan saat mengambil data');
            }
        });
    });
