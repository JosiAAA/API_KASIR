<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

</head>
<style>
    .form-class{
        margin-left:5%;
        position: absolute;
        top: 0;
        margin-top: 10%;
    }
    body{
        width: 100%;
        height: 100%;
        font-family: 'Josefin Sans', sans-serif;
        font-size: 20px;
        
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

.input-group {
    position: relative;
}

.input-group .btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    border: none;
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
    <section >
                            <div>
        
          
            
        </div>
        <div class="form-class">
        <div class="login-container">
            <h2 style="font-family: 'Josefin Sans', sans-serif; color:rgb(32, 32, 32); font-size:50px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                REGISTER
            </h2>
            <div class="icon-container">
                <div class="fa-3x" style="color: rgb(32, 32, 32); padding-bottom:3px;">
                    <i class="fa-solid fa-gear fa-spin fa-xs"></i>
                </div>
            </div>
        </div>
        
        <p class="text-white-50 mb-5" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Masukkan Data Diri Anda</p>
                                <form id="registerForm"action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="form-outline form-white">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name"
                                            name="name" placeholder="Your name" value="{{ old('name') }}" required>
                                     
                                    </div>
                                    <div class="form-outline form-white ">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control"
                                            name="email" placeholder="name@example.com" value="{{ old('email') }}"required>
                                     
                                    </div>
                                    <div class="form-outline form-white">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            <button type="button" class="btn btn-dark toggle-password" toggle="#password">
                                                <i style="cursor: pointer" class="far fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="form-outline form-white">
                                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
                                            <button type="button" class="btn btn-dark toggle-password" toggle="#password_confirmation">
                                                <i style="cursor: pointer" class="far fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                    <button class="btn btn-outline-light btn-lg px-5 custom-button" type="button" onclick="submitForm()">Register</button>
                                
                                
                                          
    
                                </form>
                            </div>
                        </div>
                        <div class="belum">
                            <p>Sudah Punya Akun? <a href="login">Login</a></p>
                        </div>
                        <a href="/welcome">
                            <div class="fa-3x home-button" style="color: rgb(32, 32, 32)">
                                <i class="fa-solid fa-arrow-left fa-xs" style="padding-top:20px; margin-top:10%; --fa-animation-duration: 3s; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i>
                            </div>
                            
                        </a>
                        
    </section>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    
    <script>
        function submitForm() {
        var form = document.getElementById('registerForm');
        var formData = new FormData(form);

        fetch('{{ route('register') }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.hasOwnProperty('message')) {
                // Handle successful registration
                alert(data.message);
                // Redirect or do any other necessary action
            } else {
                // Handle errors
                alert('Registration failed. Please check the form.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
       // JavaScript to toggle password visibility
document.querySelectorAll(".toggle-password").forEach(function (button) {
    button.addEventListener('click', function () {
        const passwordField = document.querySelector(this.getAttribute('toggle'));
        const fieldType = passwordField.getAttribute('type');

        if (fieldType === "password") {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    });
});

    </script>
    
    <script src={{ asset("background.js")}}></script>
    </body>