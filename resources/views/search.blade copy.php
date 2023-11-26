@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('style2.css') }}">
<style>
    .centered-button {
        margin-top: 20%;
        display: inline-block;
        padding: 10px 20px; /* Atur padding sesuai kebutuhan Anda */
        background-color: rgb(25, 25, 25); /* Warna latar belakang tombol */
        color: #fff; /* Warna teks tombol */
        text-decoration: none;
        border-radius: 5px; /* Atur sudut border sesuai kebutuhan Anda */
        font-size: 16px; /* Atur ukuran teks sesuai kebutuhan Anda */
        font-family: 'Josefin Sans', sans-serif;
    }
    .centered-button:hover {
        transition: transform 0.3s;
  transform: scale(1.1);
    }
   
</style>
<section class="hal-search no-flex">
    <i class="fa-solid fa-cash-register fa-bounce fa-2xl"></i>
    <h1>Cari Barang </h1>
    <p>Cari Barang  Melalui Nama barang</p>

    <div class='search-box'>
        <i class="fa-solid fa-magnifying-glass"></i>
        <form class="search-form" onsubmit="search(event)">
            <input type="text" name="query" id="searchInput" placeholder="Masukkan kata kunci..." oninput="search()">
            <button type="button" onclick="search()"></button>
        </form>
        <i class="fa-solid fa-delete-left" id="deleteIcon" onclick="clearSearch()"></i>
    </div>

   

    <div class="filter-container">
        <div class="dropdown">
            <button class="dropbtn" onclick="toggleDropdown()">By Date <i id="arrow-icon"
                    class="fa-solid fa-caret-down"></i></button>
            <div class="dropdown-content" id="dateDropdown">
                <a onclick="filterByDate('latest')">Terbaru</a>
                <a onclick="filterByDate('oldest')">Terlama</a>
            </div>
        </div>
    </div>

    <div id="result" class="container1">
    
    </div>

    <div id="noResultsMessage" style="display: none; text-align: center; margin-top: 20px; font-size: 20px; color: rgb(19, 19, 19);">
        Barang Tidak Ditemukan
        <br>
        <p>    Silahkan Coba Pencarian Lain</p>

    </div>
</section>
<script>
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
                    dataHtml += '<div class="per-content" data-judul="' + item.nama.toLowerCase() + '" data-pemilik="" data-wilayah="" data-id="' + item.id + '">';
                    dataHtml += '<div class="img-container"><img src="' + 'https://i.pinimg.com/originals/b7/f4/9d/b7f49d1b3b61ce147a361911d1a1e5cf.jpg' + '" alt=""></div>';

                    dataHtml += '<div class="deskripsi">';
                    dataHtml += '<h2 id="judul" style="text-transform: capitalize;">' + item.nama + '</h2>';

                    dataHtml += '<p id="terkumpul">Harga: ' + item.harga + ', Jumlah: ' + item.jumlah + '</p>';
                    dataHtml += '<p id="wilayah"></p>';
                    dataHtml += '<a href="#" class="centered-button delete-btn" onclick="tambahBarang(' + item.id + ', \'' + item.nama + '\', ' + item.harga + ', ' + item.jumlah + ')">';
                    dataHtml += '<i class="fa-solid fa-plus" style="color: #ffffff;"></i> Masukkan Keranjang';
                    dataHtml += '</a>';
                    dataHtml += '</div>';
                    dataHtml += '</div>';
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

function tambahBarang(barangId, nama, harga, jumlah) {
    // Lakukan permintaan AJAX untuk menambah barang ke keranjang
    var linkGambar = 'https://i.pinimg.com/originals/b7/f4/9d/b7f49d1b3b61ce147a361911d1a1e5cf.jpg'; // Ganti dengan informasi yang sesuai

    var data = {
        barang_id: barangId,
        nama_barang: nama,
        harga: harga,
        jumlah: jumlah,
        tanggal: getCurrentDate(),
        nama_pembeli: '{{ auth()->user()->name }}',
        link_gambar: linkGambar,
        total_bayar: 0,
        kembali: 0,
       

    };
    console.log('Data to be added:', data);
    $.ajax({
        url: 'http://127.0.0.1:8000/api/search/store',
        type: 'POST',
        dataType: 'json',
        data: data,
        headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
        success: function (response) {
            // Handle success, for example, update the UI or show a success message
            console.log('Barang added to keranjang successfully');
            // You may want to reload the data or update the UI accordingly
        },
        error: function () {
            // Handle error, for example, show an error message
            console.error('Error adding barang to keranjang');
        }
    });
}

function getCurrentDate() {
    var now = new Date();
    var year = now.getFullYear();
    var month = (now.getMonth() + 1).toString().padStart(2, '0');
    var day = now.getDate().toString().padStart(2, '0');
    return year + '-' + month + '-' + day;
}
function sortById(order) {
    var elements = $('.per-content');
    elements.sort(function (a, b) {
        var idA = parseInt($(a).data('id'));
        var idB = parseInt($(b).data('id'));

        if (order === 'oldest') {
            return idA - idB; // Ascending order (Terlama)
        } else {
            return idB - idA; // Descending order (Terbaru)
        }
    });

    $('#result').html(elements);
}

function filterByDate(order) {
    sortById(order);
}

$(document).ready(function () {
    setTimeout(function () {
        sortById('oldest');
    }, 1000);
});

function search() {
    var query = $('#searchInput').val().toLowerCase();
    var perContents = $('.per-content');
    var noResultsMessage = $('#noResultsMessage');

    var resultsFound = false;

    perContents.each(function () {
        var judul = $(this).attr('data-judul');

        if (judul.includes(query)) {
            $(this).show();
            resultsFound = true;
        } else {
            $(this).hide();
        }
    });

    if (resultsFound) {
        noResultsMessage.hide();
    } else {
        noResultsMessage.show();
    }
}
</script>

@endsection
