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
    <form id="tambahDataForm" action="{{ route('search/store') }}" method="post">
        @csrf
       
        <input type="hidden" name="nama_barang" id="namaBarangInput">
        <input type="hidden" name="total_harga" id="hargaInput">
        <input type="hidden" name="jumlah" id="jumlahInput">
        <input type="hidden" name="tanggal" id="tanggalInput">
        <input type="hidden" name="nama_pembeli" id="namaPembeliInput">
        <input type="hidden" name="link_gambar" id="linkGambarInput">
        <input type="hidden" name="total_bayar" id="totalBayarInput">
        <input type="hidden" name="kembali" id="kembaliInput">
    <img src=url() alt="">
        <button class="btn btn-outline-light btn-lg px-5 custom-button" type="button" onclick="submitForm()"></button>
    </form>
</section>
<script>
$(document).ready(function () {
    // Lakukan permintaan AJAX
    $.ajax({
        url: 'http://127.0.0.1:8000/api/barang', 
        type: 'GET',
        dataType: 'json',
        
        success: function (response) {
            // Proses data yang diterima dari API
            if (response.status) {
                var dataHtml = '<ul>';
                $.each(response.data, function (index, item) {
                    console.log(item);
                    dataHtml += '<div class="per-content" data-judul="' + item.nama.toLowerCase() + '" data-pemilik="" data-wilayah="" data-id="' + item.id + '">';
                    dataHtml += '<div class="img-container"><img src="' + item.link_gambar + '" alt=""></div>';

                    dataHtml += '<div class="deskripsi">';
                    dataHtml += '<h2 id="judul" style="text-transform: capitalize;">' + item.nama + '</h2>';

                    dataHtml += '<p id="terkumpul">Harga: ' + item.harga + ', Jumlah: ' + item.jumlah + '</p>';
                    dataHtml += '<p id="wilayah"></p>';
                  
                    dataHtml += '<a href="#" class="centered-button delete-btn" onclick="tambahBarang(' + item.id + ', \'' + item.nama + '\', ' + item.harga + ', ' + item.jumlah + ', \'' + item.link_gambar + '\')">';

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
@auth
function tambahBarang(barangId, nama, harga, jumlah,link_gambar) {
   
    var currentDate = getCurrentDate();
   
    // Populate form fields with data
    $('#namaBarangInput').val(nama);
    $('#hargaInput').val(harga);
    $('#jumlahInput').val(jumlah);
    $('#tanggalInput').val(currentDate);
    $('#namaPembeliInput').val('{{ auth()->user()->name }}');
    $('#linkGambarInput').val(link_gambar);
    $('#totalBayarInput').val(0);
    $('#kembaliInput').val(0);
    
    // Trigger form submission
    submitForm();
   
}
@endauth



function submitForm() {
        var form = document.getElementById('tambahDataForm');
        var formData = new FormData(form);

        fetch('{{ route('search/store') }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.hasOwnProperty('message')) {
               
                alert(data.message);
               
            } else {
                
                alert('Registration failed. Please check the form.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
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
