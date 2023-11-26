<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU ADMIN</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <style>
        body {
            margin: 0;
            font-family: "Raleway", sans-serif;
        }

        .navbar {
            height: 100vh; /* 100% tinggi viewport */
            width: 200px; /* lebar sidebar */
            background-color: rgb(19, 19, 19);
            position: fixed;
            left: 0;
            top: 0;
            overflow-x: hidden;
            padding-top: 20px;
            cursor: pointer;
        }

        .navbar a {
            padding: 20px 30px;
            text-decoration: none;
            font-size: 20px;
            color: rgb(223, 222, 222);
            display: block;
        }

        .navbar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 200px; /* Sesuaikan margin dengan lebar sidebar */
            padding: 16px;
        }

        .containerNav {
            padding: 5px;
            background-color: rgb(20, 20, 20);
            margin-top: 50%;
        }

        .additional-box {
            background-color: black;
            height: 45px; /* Sesuaikan tinggi kotak panjang */
            width: 100%; /* Sesuaikan lebar kotak panjang */
            margin-top: 30px; /* Sesuaikan jarak antara kotak dan konten */
            margin-left:0;
        }

        .additional-box p {
            color: white;
        }

        .line {
            background-color: black;
            height: 5px; /* Sesuaikan tinggi kotak panjang */
            width: 100%; /* Sesuaikan lebar kotak panjang */
            margin-top: 20px; /* Sesuaikan jarak antara kotak dan konten */
            margin-left: 0;
        }

        .btn-tmbh {
            margin-top: 5px;
            background-color:green;
            color: white;
            padding: 5px;
            border-radius: 17px;
            cursor: pointer;
            border: none;
            position: absolute;
            top: 0;
            margin-top: 10%;
            margin-left: 1%;

        }

        .additional-box {
            background-color: rgb(255, 255, 255);
            margin-top: 20px; /* Sesuaikan jarak antara kotak dan konten */
            padding: 20px; /* Sesuaikan padding dalam kotak */
            color: white;
        }

        .additional-box table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .additional-box th, .additional-box td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
            margin: 0; /* Mengatur margin menjadi nol */
        }

        .additional-box th {
            background-color: black;
            color: white;
            padding: 8px;
            text-align: left;
        }
        table td{
            color: black;
            background-color: rgb(205, 205, 205);
        }
        .editable {
            /* Menambahkan style untuk sel yang dapat diedit */
            background-color: #e1e1e1;
        }
        table{
            cursor: pointer;
        }
/* ... CSS sebelumnya ... */
/* Gaya untuk kotak dengan logo pulpen dan logo X */
.logo-box {
    display: flex;
    align-items: center;

}

.logo-box .logo-pencil {
    background-color: yellow; /* Warna latar belakang untuk logo pulpen */
    padding: 5px;
    border-radius: 5px;
}

.logo-box .logo-x {
    background-color: red; /* Warna latar belakang untuk logo X */
    padding: 5px;
    border-radius: 5px;
    margin-left: 5px; /* Jarak antara logo pulpen dan logo X */
}

.logo-box i {
    color: rgb(14, 13, 13) /* Warna ikon */
}
/* ... CSS selanjutnya ... */

    </style>
</head>
<body>
   
    <div class="navbar">
        <div class="containerNav">
            <a href="{{ url("api/admin") }}">Barang</a>
            <a href="{{ url("api/adminuser") }}">User</a>
            <a href="{{ url("api/admintransaksi") }}">Riwayat Transaksi</a>
           
            <form id="logoutForm" action="{{ route('logout') }}" method="post">
                @csrf
                <a>
                    <input class="profile logout" type="submit" value="Logout" onclick="confirmLogout(event)" style="background-color: rgba(0, 0, 0, 0);  color: rgb(223, 222, 222);border:none; font-size:20px;">
                    <i class="fa-solid fa-arrow-right-to-bracket" style=" color: rgb(223, 222, 222);"></i>
                </a>
            </form>
            
          
        </div>
    </div>

    <div class="content">
        <h2>Selamat Datang Admin</h2>
        <p>Ini adalah menu admin</p>
      
        <!-- Menambahkan kotak panjang berwarna hitam di bawah tulisan -->
        <div class="line"></div>
       
       
    </div>

</body>
<script src="https://kit.fontawesome.com/7ca9478353.js" crossorigin="anonymous"></script>
<script>
       function confirmLogout(event) {
        event.preventDefault();

        // Tampilkan konfirmasi
        if (confirm('Apakah Anda yakin ingin logout?')) {
            // Jika pengguna mengonfirmasi, kirim formulir
            document.getElementById('logoutForm').submit();
        } else {
            // Jika pengguna membatalkan, tidak lakukan apa-apa
        }
    }
</script>
@yield("content")
</html>
