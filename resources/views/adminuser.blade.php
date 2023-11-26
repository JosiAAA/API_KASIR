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
    

<h2 style="margin-left:40%;">Tabel User</h2>



<div class="additional-box">
    <table id="myTable">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Saldo</th>
            <th>Password</th>
            <th>Opsi</th>
        </tr>
        <!-- Isi tabel disesuaikan dengan data yang sesuai -->
        @foreach($user as $p)
        <tr class="data-row" data-id="{{ $p->id }}">
            <td>{{ $loop->iteration }}</td>
            <td><input type="text" name="name[]" value="{{ $p->name }}" /></td>
            <td><input type="text" name="email[]" value="{{ $p->email }}" /></td>
            <td><input type="text" name="role[]" value="{{ $p->role }}" /></td>
            <td><input type="text" name="saldo[]" value="{{ $p->saldo }}" /></td>
            <td><input type="text" name="password[]" value="{{ $p->password }}" /></td>
           
            <td>
                <div class="logo-box">
                    <form action="{{ url("api/hapususer/$p->id") }}" method="DELETE">
                        @csrf
                        <button style="background-color:red;cursor: pointer;" type="submit" onclick="return konfirmasiHapus()"><i class="fa-solid fa-xmark"></i></button>
                    </form>
                    <button style="margin-left:5px;background-color:rgb(255, 140, 0);cursor: pointer;" onclick="showUpdateForm('{{ $p->id }}','{{ $p->name }}', '{{ $p->email }}', '{{ $p->role }}', '{{ $p->saldo }}', '{{ $p->password }}')">
                        <i class="fa-solid fa-pen">Update</i>
                    </button>
                </div>
            </td>
        </tr>
        <tr class="form-update" style="display: none;" data-id="{{ $p->id }}">
            <form action="{{ url("api/updateuser/$p->id") }}" method="POST">
                @csrf
                @method('PUT')
                <td>{{ $loop->iteration }}</td>
                <td><input type="text" name="name" value="" required /></td>
                <td><input type="text" name="email" value="" required /></td>
                <td><input type="text" name="role" value="" required /></td>
                <td><input type="number" name="saldo" value="" required /></td>
                <td><input type="text" name="password" value="" required /></td>
              
                <td>
                    <button style="background-color:green;cursor: pointer;" type="submit">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </td>
            </form>
        </tr>
        @endforeach
        <form class="formCreate"  id="formCreate" action="{{ url("api/user/store") }}" method="POST">
            @csrf
            <td>CREATE DATA</td>
            <td><input type="text" name="name" value="" required /></td>
            <td><input type="text" name="email" value="" required /></td>
            <td><input type="text" name="role" value="" required /></td>
            <td><input type="number" name="saldo" value="" required /></td>
            <td><input type="text" name="password" value="" required /></td>
           
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
    function showUpdateForm(id,name, email, role, saldo, password) {
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
    updateFormRow.querySelector('input[name="name"]').value = name;
    updateFormRow.querySelector('input[name="email"]').value = email;
    updateFormRow.querySelector('input[name="role"]').value = role;
    updateFormRow.querySelector('input[name="saldo"]').value = saldo;
    updateFormRow.querySelector('input[name="password"]').value = password;
  
}
function toggleFormCreate() {
        const formCreate = document.querySelector('.formCreate');
        formCreate.style.display = "block"
    }

</script>
@endsection 