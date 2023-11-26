@extends('layouts.base')
@section('content')
<link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Form Input Barang</title>
</head>
<body>

    <h2>Form Input Barang</h2>

    <form id="formInputBarang">
        <label for="nama">Nama Barang:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="harga">Harga Barang:</label>
        <input type="number" id="harga" name="harga" required><br>

        <label for="jumlah">Jumlah Barang:</label>
        <input type="number" id="jumlah" name="jumlah" required><br>

        <button type="button" onclick="submitForm()">Submit</button>
    </form>

    <script>
        function submitForm() {
            var nama = document.getElementById('nama').value;
            var harga = document.getElementById('harga').value;
            var jumlah = document.getElementById('jumlah').value;

           
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "api/barang/store", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status) {
                        alert(response.message);
                        // Reset formulir jika submit berhasil
                        document.getElementById('formInputBarang').reset();
                    } else {
                        alert("Terjadi kesalahan: " + response.message);
                    }
                }
            };

            var data = {
                nama: nama,
                harga: harga,
                jumlah: jumlah
            };

            xhr.send(JSON.stringify(data));
        }
    </script>

</body>

@endsection