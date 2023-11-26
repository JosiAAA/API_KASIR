

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    
</head>
<style>
    .form-class{
        margin-left: 5%;
        position: absolute;
        top: 0;
        margin-top: 10%;
    }
    body{
        width: 100%;
        height: 100%;
        font-family: 'Josefin Sans', sans-serif;
        font-size: 20px;
       background-color: rgba(255, 255, 255, 0.313);
        background-size: cover;
        overflow-x: hidden;
        
    }
    /* Tambahkan pada bagian CSS Anda */
.form-outline {
    display: flex;
    flex-direction: column;
}

.form-outline label {
    margin-bottom: 8px;
}

/* Tambahkan pada bagian CSS Anda */
.form-outline input,
.form-outline select {
    width: 100%;
    height: 40px;
    border-radius: 50px;
    padding: 7px; /* Tambahkan padding sesuai kebutuhan */
    /* Hindari penambahan padding mengubah lebar input */
 
}
.custom-font {
    font-family: 'Josefin Sans', sans-serif;
 }
 .custom-button {
    border-radius: 30px;
    transition: background-color 0.3s, color 0.3s; /* Animasi hover */
    border:none;S
    font-size: 15px;
    padding: 10px;
}

.custom-button:hover {
    background-color: rgb(30, 30, 30);
    color: white;
    cursor: pointer;
}

.form-outline {
    margin-bottom: 20px; /* Jarak antara form elements */
}
.custom-input {
    height:35px ;
    padding: 20px; /* Sesuaikan padding sesuai kebutuhan */
    font-family: 'Josefin Sans', sans-serif;
}

.belum{
    position: absolute;
    top: 0;
    right:0;
    margin-right: 1%;
}
.belum a {
    text-decoration: none; /* Menghilangkan garis bawah */
    color: rgb(14, 14, 14); /* Warna teks awal */
   /* Efek shadow */
    transition: color 0.3s ease; /* Transisi warna saat dihover */
}

.belum a:hover {
    color: rgb(255, 255, 255); /* Warna teks saat dihover */
}

.login-container {
    display: flex;
    align-items: center;
}

.icon-container {
    margin-left: 10px; /* Sesuaikan jarak antara teks dan ikon */
}

.home-button{
    position: absolute;
    left: 0;
    margin-left: 2%;
    top: 0;
    margin-top: 10px;

}
#webcoderskull{
    position: absolute;
    left: 0;
    top: 50%;
    padding: 0 20px;
    width: 100%;
    text-align: center;
}

canvas{
    height:100vh;
    background-color:#ffffff;
}
#webcoderskull h1{
  letter-spacing: 5px;
  font-size: 5rem;
  font-family: 'Roboto', sans-serif;
  text-transform: uppercase;
  font-weight: bold;
}

</style>
<section id="particles">
    <div id="webcoderskull"></div></section>
<body>
    <section>
        <div>
        </div>
        <div class="form-class">
            <div class="login-container">
                <h2 style="font-family: 'Josefin Sans', sans-serif; color:rgb(32, 32, 32); font-size:50px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                    LOGIN
                </h2>
                <div class="icon-container">
                    <div class="fa-3x" style="color: rgb(32, 32, 32); padding-bottom:3px;">
                        <i class="fa-solid fa-gear fa-spin fa-xs"></i>
                    </div>
                </div>
            </div>
            <p class="text-white-50 mb-5" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Masukkan Email and Password yang telah terdaftar</p>
            <form id="loginForm" action="{{ route('login') }}" method="post" style="">
                @csrf
                <div class="form-outline form-white mb-4">
                    <label style="color: rgba(32, 32, 32, 0.849)" for="email">Email</label>
                    <input type="email" id="typeEmailX" class="form-control form-control-lg custom-input" name="email"
                        placeholder="contoh@gmail.com" value="{{ old('email') }}" required>
                </div>
                <div class="form-outline form-white mb-4">
                    <label style="color: rgba(32, 32, 32, 0.849); padding-top:4px;" for="password">Password</label>
                    <input type="password" id="typePasswordX" class="form-control form-control-lg custom-input" name="password"
                        placeholder="password" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="showPassword">
                    <label  style="color: rgba(32, 32, 32, 0.849);font-size:15px;" class="form-check-label text-white" for="showPassword">Show Password</label>
                </div>
                <div class="form-outline form-white mb-4">
                    <label style="color: rgba(32, 32, 32, 0.849); padding-top:9px;"  for="role">Role</label>
                    <select class="form-control form-control-lg" name="role" required>
                        <option style="color: rgba(32, 32, 32, 0.849); font-size: 14px;" value="user">User</option>
                        <option style="color: rgba(32, 32, 32, 0.849); font-size: 14px;"  value="admin">Admin</option>
                    </select>
                </div>
                <button class="btn btn-outline-light btn-lg px-5 custom-button" style="margin-top:5%;" type="button" onclick="submitForm()">Login</button>
            </form>
        </div>
        <div class="belum">
            <p>Belum Punya Akun? <a href="register">Register</a></p>
        </div>
        <a href="home">
            <div class="fa-3x home-button" style="color: rgb(29, 29, 29)">
                <i class="fa-solid fa-arrow-left fa-xs" style="padding-top:20px; margin-top:10%; --fa-animation-duration: 3s; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i>
            </div>
        </a>
    </section>
    <script>
      
        document.getElementById('showPassword').addEventListener('change', function () {
            var passwordInput = document.getElementById('typePasswordX');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
    
    <script src={{ asset("background.js")}}></script>
    





    <!-- Add this script in your HTML -->
<!-- Add this script in your HTML -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function submitForm() {
        var formData = $('#loginForm').serialize();

        $.ajax({
            type: 'POST',
            url: '{{ route("login") }}',
            data: formData,
            success: function(response) {
                // Handle successful login
                var role = response.user.role;

                if (role === 'admin') {
                    window.location.href = '{{ url("api/admin") }}';
                } else if (role === 'user') {
                    window.location.href = '{{ url("api/home") }}';
                } else {
                    // Handle unknown role or other cases
                }
            },
            error: function(error) {
                // Handle login error
                console.log(error.responseJSON.message);
                // You can show an error message to the user
            }
        });
    }
</script>


</body>


