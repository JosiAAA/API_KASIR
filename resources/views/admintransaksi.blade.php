@extends('layouts.baseAdmin')
@section('content')

<style>
   section{
    margin-left: 11.1%;
   }
   img{
    max-width: 50px;
   }

</style>
<section class="barang">
    

<h2 style="margin-left:40%;">Tabel Riwayat Transaksi</h2>



<div class="additional-box">
    <table id="myTable">
        <tr>
            <th>No.</th>
            <th>Nama Pembeli</th>
            <th>Nama barang</th>
            <th>Harga Barang</th>
            <th>Jumlah</th>
            <th>Total Bayar</th>
            <th>Tanggal Pembelian</th>
            <th>link Gambar</th>
            <th>Gambar Barang</th>
            <th>Opsi</th>
        </tr>
        <!-- Isi tabel disesuaikan dengan data yang sesuai -->
        @foreach($user as $p)
        <tr class="data-row" data-id="{{ $p->id }}">
            <td>{{ $loop->iteration }}</td>
            <td><input type="text" name="nama_pembeli[]" value="{{ $p->nama_pembeli }}" /></td>
            <td><input type="text" name="nama_barang[]" value="{{ $p->nama_barang }}" /></td>
            <td><input type="text" name="total_harga[]" value="{{ $p->total_harga }}" /></td>
            <td><input type="text" name="jumlah[]" value="{{ $p->jumlah }}" /></td>
            <td><input type="text" name="total_bayar[]" value="{{ $p->total_bayar }}" /></td>
            <td><input type="text" name="tanggal[]" value="{{ $p->tanggal }}" /></td>
            <td><input type="text" name="link_gambar[]" value="{{ $p->link_gambar }}" /></td>
            <td><img src="{{ $p->link_gambar }}" alt="Gambar 1"></td>
           
            <td>
                <div class="logo-box">
                    <form action="{{ url("api/hapusTransaksi/$p->id") }}" method="DELETE">
                        @csrf
                        <button style="background-color:red;cursor: pointer;" type="submit" onclick="return konfirmasiHapus()"><i class="fa-solid fa-xmark"></i></button>
                    </form>
                    <button style="margin-left:5px;background-color:rgb(255, 140, 0);cursor: pointer;" onclick="showUpdateForm('{{ $p->id }}','{{ $p->nama_pembeli }}', '{{ $p->nama_barang }}', '{{ $p->total_harga }}', '{{ $p->jumlah }}', '{{ $p->total_bayar }}', '{{ $p->tanggal }}', '{{ $p->link_gambar }}')">
                        <i class="fa-solid fa-pen">Update</i>
                    </button>
                </div>
            </td>
        </tr>
        <tr class="form-update" style="display: none;" data-id="{{ $p->id }}">
            <form action="{{ url("api/updateTransaksi/$p->id") }}" method="POST">
                @csrf
                @method('PUT')
                <td>{{ $loop->iteration }}</td>
                <td><input type="text" name="nama_pembeli" value="" required /></td>
                <td><input type="text" name="nama_barang" value="" required /></td>
                <td><input type="number" name="total_harga" value="" required /></td>
                <td><input type="number" name="jumlah" value="" required /></td>
                <td><input type="number" name="total_bayar" value="" required /></td>
                <td><input type="text" name="tanggal" value="" required /></td>
                <td><input type="text" name="link_gambar" value="" required /></td>
                <td><img src="{{ $p->link_gambar }}" alt="Gambar 1"></td>
                <td>
                    <button style="background-color:green;cursor: pointer;" type="submit">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </td>
            </form>
        </tr>
        @endforeach
        <form class="formCreate"  id="formCreate" action="{{ url("api/transaksi/store") }}" method="POST">
            @csrf
            <td>CREATE DATA</td>
            <td><input type="text" name="nama_pembeli" value="" required /></td>
            <td><input type="text" name="nama_barang" value="" required /></td>
            <td><input type="number" name="total_harga" value="" required /></td>
            <td><input type="number" name="jumlah" value="" required /></td>
            <td><input type="number" name="total_bayar" value="" required /></td>
            <td><input type="text" name="tanggal" value="" required /></td>
            <td><input type="text" name="link_gambar" value="" required /></td>
         
                <td><img src="https://media.istockphoto.com/id/1354776457/vector/default-image-icon-vector-missing-picture-page-for-website-design-or-mobile-app-no-photo.jpg?s=612x612&w=0&k=20&c=w3OW0wX3LyiFRuDHo9A32Q0IUMtD4yjXEvQlqyYk9O4=" alt="Updated Gambar" id="createdImage"></td>
            <td>
                <button style="background-color:green;cursor: pointer;" type="submit">
                    <i class="fa-solid fa-check"></i>
                </button>
            </td>
        </form> 
    </table>


   <div>
   
   </div>
</div>
 




</section>
<script>
    function konfirmasiHapus() {
        return confirm('Apakah Anda yakin ingin menghapus postingan ini?');
    }
    function showUpdateForm(id,nama_pembeli, nama_barang, total_harga,jumlah,total_bayar,tanggal,link_gambar) {
    // Hide all form-update rows
    document.querySelectorAll('.form-update').forEach(row => {
        row.style.display = 'none';
    });

    // Hide all data-row rows, except the one with the selected ID
    document.querySelectorAll('.data-row').forEach(row => {
        if (row.getAttribute('data-id') == id) {
            row.style.display = 'none';
        } else {
            row.style.display = ''; // Show the selected data-row
        }
    });

    // Show the selected update form row
    const updateFormRow = document.querySelector(`.form-update[data-id="${id}"]`);
    updateFormRow.style.display = '';

    // Populate the update form fields with the selected data
    updateFormRow.querySelector('input[name="nama_pembeli"]').value = nama_pembeli;
    updateFormRow.querySelector('input[name="nama_barang"]').value = nama_barang;
    updateFormRow.querySelector('input[name="total_harga"]').value = total_harga;
    updateFormRow.querySelector('input[name="jumlah"]').value = jumlah;
    updateFormRow.querySelector('input[name="total_bayar"]').value = total_bayar;
    updateFormRow.querySelector('input[name="tanggal"]').value = tanggal;
    updateFormRow.querySelector('input[name="link_gambar"]').value = link_gambar;
}
function toggleFormCreate() {
        const formCreate = document.querySelector('.formCreate');
        formCreate.style.display = "block"
    }

</script>
@endsection 