
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="{{ asset('style.css') }}">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<title>KASIR</title>
<script nonce="7e53b25d-b476-4c5e-ad43-ed051cfd14c8">(function(w,d){!function(a,b,c,d){a[c]=a[c]||{};a[c].executed=[];a.zaraz={deferred:[],listeners:[]};a.zaraz.q=[];a.zaraz._f=function(e){return async function(){var f=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:f})}};for(const g of["track","set","debug"])a.zaraz[g]=a.zaraz._f(g);a.zaraz.init=()=>{var h=b.getElementsByTagName(d)[0],i=b.createElement(d),j=b.getElementsByTagName("title")[0];j&&(a[c].t=b.getElementsByTagName("title")[0].text);a[c].x=Math.random();a[c].w=a.screen.width;a[c].h=a.screen.height;a[c].j=a.innerHeight;a[c].e=a.innerWidth;a[c].l=a.location.href;a[c].r=b.referrer;a[c].k=a.screen.colorDepth;a[c].n=b.characterSet;a[c].o=(new Date).getTimezoneOffset();if(a.dataLayer)for(const n of Object.entries(Object.entries(dataLayer).reduce(((o,p)=>({...o[1],...p[1]})),{})))zaraz.set(n[0],n[1],{scope:"page"});a[c].q=[];for(;a.zaraz.q.length;){const q=a.zaraz.q.shift();a[c].q.push(q)}i.defer=!0;for(const r of[localStorage,sessionStorage])Object.keys(r||{}).filter((t=>t.startsWith("_zaraz_"))).forEach((s=>{try{a[c]["z_"+s.slice(7)]=JSON.parse(r.getItem(s))}catch{a[c]["z_"+s.slice(7)]=r.getItem(s)}}));i.referrerPolicy="origin";i.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a[c])));h.parentNode.insertBefore(i,h)};["complete","interactive"].includes(b.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>

<body>
    
    <style>
        
        #saldo {
        position: relative;
        display: inline-block;
        text-decoration: none;
        color: #000; /* Ubah warna teks sesuai kebutuhan Anda */
    }
    .dropdown-content {
        display: none;
        position: absolute;
       
        min-width: 160px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        padding: 10px;
        border-radius: 5px;
    }

    #saldo:hover .dropdown-content {
        display: block;
    }

    .dropdown-content button {
        display: inline-block;
        margin-top: 10px; /* Sesuaikan margin sesuai kebutuhan Anda */
        padding: 5px 10px; /* Sesuaikan padding sesuai kebutuhan Anda */
        /* Warna latar belakang tombol */
        color: #fff; /* Warna teks tombol */
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    #TopupFormContainer {
        display: none;
        position: fixed;
        top: 30%;
        left: 43%;
        transform: translate(-50%, -50%);
        background-color: #242424; /* Warna latar belakang hitam */
        padding: 20px;
        width: 300px; /* Lebar form */
        border-radius: 10px;
        color: #fff; /* Warna teks */
        z-index: 100;
    }

    #TopupFormContainer button {
        float: right;
        color: #fff; /* Warna teks tombol close (X) */
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    #TopupFormContainer form {
        margin-top: 10px; /* Sesuaikan margin sesuai kebutuhan Anda */
    }

    #TopupFormContainer label {
        display: block;
        margin-bottom: 0px; /* Sesuaikan margin sesuai kebutuhan Anda */
    }

    #TopupFormContainer select, #TopupFormContainer input[type="checkbox"] {
        margin-top: 3px; /* Sesuaikan margin sesuai kebutuhan Anda */
        
    }

    #TopupFormContainer button.black-button {
        background-color: #000; /* Warna latar belakang tombol */
        color: #fff; /* Warna teks tombol */
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    #TopupFormContainer #confirmationContainer {
        display: flex;
        align-items: center;
    }

    #TopupFormContainer #confirmationCheckbox {
        margin-right: 5px;
    }
    #TopupFormContainer input {
         /* Sesuaikan margin sesuai kebutuhan Anda */
        width: 100%; /* Lebar input 100% untuk mengisi seluruh lebar container */
        padding-left: 5px; 
        font-family: 'Josefin Sans', sans-serif;
    }
    
    </style>
  
    <div class="custom-box" id="customBox"></div>
            <div class="navbar">
            <div id="search">
            <a href='{{ url('api/search') }}' class="search-link">
                <span class="fas fa-search" style="margin-right: 8px;"></span>
                <span style="margin-left: -5px;">Search</span>
            </a>
            </div>
            <a href="{{ url('api/home') }}"> <i class="fa-solid fa-cash-register fa-2xl"></i></a>
           
            <div class="options-area">
                @auth
    <a id="saldo">Saldo Rp. {{ number_format(auth()->user()->saldo, 0, ',', '.') }},00<i style="margin-left:2px;" class="fas fa-caret-down"></i>
        <div class="dropdown-content">
            <button style="color: #000;" onclick="showTopupForm()">Topup</button>
        </div>
    </a>
    <a style="margin-left:2px;" href="keranjang" id="Post" class="nav-link">Keranjang
        <i class="fa-solid fa-cart-shopping"></i></a>
@endauth

            <a href="#second" id="tentang"class="nav-link">About</a>  
            <div class="nav-link-container">
                @auth
                <span class="profile fa-regular fa-user" style="margin-right: 8px; "></span>
                <span style="margin-left: -5px; color #302e2e; font-size: 16px; text-transform: capitalize;"><span id="username">{{ auth()->user()->name }}</span><i class="profile nav-link fas fa-caret-down" style="margin-left: 5px;"></i></span>
                <div class="dropdown-content logout1">
                    <form id="logoutForm" action="{{ route('logout') }}" method="post">
             @csrf
                    <input class="profile logout" type="submit" value="Logout" onclick="confirmLogout(event)">
                </form>
                </div>
                
               @endauth
                @guest
                <a href="#main" id="Profil" class="nav-link">Account <i class="fas fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="login">Login</a>
                    <a href="register">Register</a>
                </div>
                @endguest
              
            </div>
         
            
            </div>
        </div>
        @auth
        <div id="TopupFormContainer">
    <button onclick="closeTopupForm()" style="float: right;">X</button>
    <form action="{{ url('api/topup') }}" id="paymentForm" method="POST">
        @csrf
        <label style="font-family: 'Josefin Sans', sans-serif;" for="topup">Nominal:</label>
        <input style="color: black;" type="number" id="topup" name="topup" min="1" max="1000000000" placeholder="Masukkan Angka" required>
        <div id="confirmationContainer">
            <label style="font-family: 'Josefin Sans', sans-serif;" for="confirmationCheckbox">Konfirmasi</label>
            <input type="checkbox" id="confirmationCheckbox" required>
        </div>
        <button style="font-family: 'Josefin Sans', sans-serif;" type="submit" class="black-button">TopUp</button>
    </form>
</div>

@endauth
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
            function closeTopupForm() {
        var TopupFormContainer = document.getElementById('TopupFormContainer');
        if (TopupFormContainer) {
            TopupFormContainer.style.display = 'none';
            TopupFormContainer.style.color = 'white';
            var halDonasiSection = document.querySelector('.hal-donasi');
            if (halDonasiSection) {
                TopupFormContainer.style.display = 'none';
                halDonasiSection.classList.remove('blur');
            }
        }
    }
      
      window.addEventListener('scroll', function() {
          var navbar = document.querySelector('.navbar');
        
          if (window.scrollY > 10) {
             
              navbar.style.borderRadius = '0'; 
              navbar.style.boxShadow = 'none';
             
           
              customBox.style.height = '75px';
              customBox.style.display = 'block';
              customBox.style.width = '100%';
              customBox.style.boxShadow = '0px 4px 6px rgba(0, 0, 0, 0.3)';
             

          } else {
              customBox.style.display = 'none';
              navbar.style.borderRadius = '50px'; 
              navbar.style.boxShadow = '0px 4px 6px rgba(0, 0, 0, 0.3)';
       
          }
      }); 
      function smoothScroll(target) {
          const element = document.querySelector(target);
          element.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }

      // Event listener for navigation links
      document.querySelectorAll('.nav-link').forEach(function(navLink) {
          navLink.addEventListener('click', function(event) {
              event.preventDefault(); // Prevent default behavior of the link
              const targetSectionId = this.getAttribute('href');
              smoothScroll(targetSectionId);
          });
      });

      window.addEventListener('scroll', function() {
          // Your existing scroll event code
      });
      @auth
      document.getElementById('Post').addEventListener('click', function() {
        window.location.href = '{{ url('api/keranjang', ['nama' => auth()->user()->name]) }}';

       
    });
    @endauth
    document.addEventListener('DOMContentLoaded', function() {
        var currentPath = window.location.pathname; // Mendapatkan path halaman saat ini

        if (currentPath !== '/welcome') {
            // Jika bukan halaman /welcome, sembunyikan elemen dengan ID 'tentang'
            var tentangLink = document.getElementById('tentang');
            if (tentangLink) {
                tentangLink.style.display = 'none';
                var logoo = document.querySelector('.logo');
                logoo.style.marginLeft="20%";
            }
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
    var currentPath2 = window.location.pathname;
    var donationPageString = "keranjang"; // String untuk mencocokkan pola '/keranjang'

    if (currentPath2.indexOf(donationPageString) === -1) {
        // Jika berada di halaman selain /keranjang, lakukan sesuatu di sini
        var saldo = document.getElementById('saldo'); // Sesuaikan dengan ID yang sebenarnya
        if (saldo) {
            saldo.style.display = 'none';
        }
    }
});

function showTopupForm() {
    var TopupFormContainer = document.getElementById('TopupFormContainer');
    TopupFormContainer.style.display = 'block';
    var halDonasiSection = document.querySelector('.hal-donasi');
    halDonasiSection.classList.add('blur');
   
}


  </script>
        
            
    <script src="https://kit.fontawesome.com/7ca9478353.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</body> 
@yield("content")
</html>