@extends('layouts.base')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{ asset('style2.css') }}">
<style>
    h2,p{
        font-family: "Raleway", sans-serif;
        
    }
    body{   
      
        overflow: hidden;
    }
    p{
        color: rgb(25, 25, 25);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
    h2{
        font-size: 30px;

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
    <div id="webcoderskull">
      
       
        <i class="fa-solid fa-cash-register fa-bounce fa-2xl"></i>
        <br>
        <br>

        
        <h2>Selamat Datang di Aplikasi CRUD Kasir</h2>
        <p>website ini menggunakan API </p>
        <div id="result"></div>
        </div>
</section>
 
     

<script src={{ asset("background.js")}}></script>
{{-- <script src={{ asset("tampil.js")}}></script> --}}

@endsection 