@extends('layouts.base')
@section('content')

<link rel="stylesheet" href="{{ asset('style2.css') }}">
<style>
    .hand{
        position: absolute;
        top:0;
        margin-top: 8%;
        left: 0;
        margin-left:48.2%;

    }
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
    form.paymentForm {
        display: none;
        top: 0;
        margin-top: 10%;
            margin-left: 35%;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            text-align: center;
            position: absolute;
            z-index: 500;
        }
        form.paymentForm2 {
        display: none;
        top: 0;
        margin-top: 10%;
            margin-left: 35%;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            text-align: center;
            position: absolute;
            z-index: 500;
        }

        h1#receiptTitle {
            margin-bottom: 20px;
        }

        table#itemTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }

        div#total {
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="checkbox"]#confirmationCheckbox {
            margin-right: 5px;
        }

        button#confirmButton {
            background-color: #1c1c1c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button#confirmButton:hover {
            transition: transform 0.3s;
  transform: scale(1.1);
        }
        button.closeButton {
            font-size: 15px;
            padding: 3px;
            background-color: #131313;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }
</style>
<section class="hal-search no-flex">
    
  <h1 style="margin-left:0%;">Keranjang Belanja  Anda</h1>
  <p>lakukan checkout untuk melakukan pembelian</p>

  {{-- <form action="{{ route('search') }}" method="get"> --}}
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
{{-- </section>
<section class="hal-konten"> --}}
<div class='container1'>
    
    @foreach($keranjang as $p)
    @auth
   
        @endauth
    <div class="per-content" data-judul="{{ strtolower($p->nama_barang) }}" data-pemilik="{{ strtolower($p->nama_pembeli) }}" data-id="{{ $p->id }}">

        <div class="img-container">
            <img src="{{ $p->link_gambar }}" alt="">
        </div>
        <div class="deskripsi">
            <h2 id="judul" style="text-transform: capitalize;">{{ $p->nama_barang }}</h2>
          
            <p id="terkumpul">Harga : Rp. {{ number_format($p->total_harga, 0, ',', '.') }},00</p>

            <p id="wilayah">{{ $p->tanggal }}</p>
            <p id="jumlah">Quantity: {{ $p->jumlah }}</p>
            <form action="{{ url("api/delete/$p->id") }}" method="DELETE">
                @csrf
               
                <button type="submit" class="centered-button delete-btn" onclick="return konfirmasiHapus()">
                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                    Hapus Barang
                </button>
            </form>
            
        </div>
    </div>
    
    <div id="noResultsMessage" style="display: none; text-align: center; margin-top: 20px; font-size: 20px; color: rgb(19, 19, 19);">
        Barang Tidak Ditemukan
        <br>
        <p>    Silahkan Coba Pencarian Lain</p>

    </div>
    @endforeach
    @if(count($keranjang) > 0)
    <div style="position: absolute;top:0;margin-left:70%;margin-top:9%;" class="check-out">
        <button class="centered-button" onclick="showPaymentForm()" id="checkoutButton">Checkout</button>
    </div>
        @endif
        @if(count($keranjang) < 1)
        <div id="noResultsMessage" style=" text-align: center; margin-top: 20px; font-size: 20px; color: rgb(19, 19, 19);">
            Keranjang Anda Kosong
            <br>
            <p>    silahkan menambahkan barang pada keranjang</p>
        
        </div>
        @endif

        <form id="tambahDataForm" action="{{ route('keranjang/store') }}" method="post" class="paymentForm" >
      
            <button class="closeButton" onclick="hidePaymentForm()">X</button>
            <h1 id="receiptTitle">Struk Pembayaran</h1>
            
            <table id="itemTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalPembelian = 0; @endphp
                    @csrf
                    @foreach($keranjang as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->nama_barang }}</td>
                            <td>Rp. {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                            <td>x{{ $p->jumlah }}</td>
                            <input type="hidden" name="keranjang[{{ $index }}][nama_barang]" value="{{ $p->nama_barang }}">
                            <input type="hidden" name="keranjang[{{ $index }}][total_harga]" value="{{ $p->total_harga }}">
                            <input type="hidden" name="keranjang[{{ $index }}][jumlah]" value="{{ $p->jumlah }}">
                            <input type="hidden" name="keranjang[{{ $index }}][total_bayar]" value="{{ $p->total_bayar }}">
                            <input type="hidden" name="keranjang[{{ $index }}][kembali]" value="{{ $p->kembali }}">
                            <input type="hidden" name="keranjang[{{ $index }}][nama_pembeli]" value="{{ $p->nama_pembeli }}">
                            <input type="hidden" name="keranjang[{{ $index }}][tanggal]" value="{{ $p->tanggal }}">
                            <input type="hidden" name="keranjang[{{ $index }}][link_gambar]" value="{{ $p->link_gambar }}">
                         </tr>
                        @php $totalPembelian += $p->total_harga; @endphp
                    @endforeach
                    
                </tbody>
            </table>
    
            <div id="total">Total Pembelian: Rp. {{ number_format($totalPembelian, 0, ',', '.') }}</div>
    
            <label for="confirmationCheckbox">Konfirmasi Pembayaran</label>

          

            <input type="checkbox" id="confirmationCheckbox" name="konfirmasi" required>
            
            <button onclick="submitForm()" type="submit" id="confirmButton"required>Konfirmasi Pembayaran </button>
        </form>

        <div style="position: absolute;top:0;margin-left:80%;margin-top:9.2%;" class="check-out">
            <button class="centered-button" onclick="showPaymentForm2()" id="checkoutButton">History</button>
        </div>

        <form action='#'class="paymentForm2" >
      
            <button class="closeButton" onclick="hidePaymentForm2()">X</button>
            <h1 id="">CATATAN PEMBELIAN</h1>
            
            <table id="itemTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalPembelian = 0; @endphp
                  
                    @foreach($history as $indexx => $a)
                        <tr>
                            <td>{{ $indexx + 1 }}</td>
                            <td>{{ $a->nama_barang }}</td>
                            <td>Rp. {{ number_format($a->total_harga, 0, ',', '.') }}</td>
                            <td>x{{ $a->jumlah }}</td>
                         </tr>
                        @php $totalPembelian += $a->total_harga; @endphp
                    @endforeach
                    
                </tbody>
            </table>
    
            <div id="total">Total Pembelian: Rp. {{ number_format($totalPembelian, 0, ',', '.') }}</div>
    
            
        </form>
    
</div>

</section>
<script>
    function showPaymentForm2() {
            var paymentForm = document.querySelector('.paymentForm2');
            paymentForm.style.display = 'block';
        }

        
        function hidePaymentForm2() {
            var paymentForm = document.querySelector('.paymentForm2');
            paymentForm.style.display = 'none';
        }
  function showPaymentForm() {
            var paymentForm = document.querySelector('.paymentForm');
            paymentForm.style.display = 'block';
        }

        
        function hidePaymentForm() {
            var paymentForm = document.querySelector('.paymentForm');
            paymentForm.style.display = 'none';
        }
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
function filterByDate(order) {
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


function konfirmasiHapus() {
        return confirm('Apakah Anda yakin ingin menghapus postingan ini?');
    }

    function submitForm() {
   var form = document.getElementById('tambahDataForm');
   var formData = new FormData(form);

   fetch('{{ route('keranjang/store') }}', {
      method: 'POST',
      headers: {
         'Accept': 'application/json',
         'Content-Type': 'application/json',
         'X-CSRF-TOKEN': '{{ csrf_token() }}',
      },
      body: JSON.stringify(Object.fromEntries(formData)),
   })
   .then(response => response.json())
   .then(data => {
      if (data.hasOwnProperty('message')) {
        
      } else {
         alert(' failed. Please check the form.');
      }
   })
   .catch(error => {
      console.error('Error:', error);
   });
}


</script>


@endsection