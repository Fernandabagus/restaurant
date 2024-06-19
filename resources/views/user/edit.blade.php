@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('updateUsers', $user->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="img">Image</label>
                                <input type="file" class="form-control" name="img" onchange="loadFile(event)">
                                @if ($user->img)
                                    <img src="{{ asset($user->img) }}" alt="{{ $user->name }}" width="100">
                                @endif
                                <img id="output" class="img-fluid mt-2 mb-4" width="100" />
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id=""
                                    required="required" value="{{ old('name', $user->name) }}" placeholder="Input nama here">
                            </div>
                            <div class="form-group">
                                <label for="username">UserName</label>
                                <input type="text" class="form-control" name="username" id=""
                                    required="required" value="{{ old('name', $user->username) }}" placeholder="Input usernama here">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id=""
                                    required="required" value="{{ old('name', $user->email) }}" placeholder="Input email here">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id=""
                                    required="required" value="{{ old('name', $user->phone) }}" placeholder="Input  phone here">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id=""
                                    required="required" value="{{ old('name', $user->address) }}" placeholder="Input address here">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="" required="required">
                                <small>Leave blank if you don't want to change the password</small>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="" required="required">
                            </div>
                            <div class="form-group">

                                <label for="exampleFormControlInput1" class="form-label">Role</label>
                                <select name="role" class="form-control" aria-label="Default select example">
                                    <option disabled selected value>
                                        Choose...
                                    </option>
                                    <option value="sa">Sa</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <a href="{{ route('daftarUsers') }}" class="btn btn-outline-secondary mr-2"
                                role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    {{-- <script>
    /* Format Rupiah */
    var food_price_display = document.getElementById('food_price_display');
    var food_price = document.getElementById('harga');

    food_price_display.addEventListener('keyup', function(e) {
        var formattedValue = formatRupiah(this.value, 'Rp. ');
        food_price_display.value = formattedValue;
        food_price.value = formatNumber(this.value);
    });

    /* Format currency with Rupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    /* Format number without currency symbol */
    function formatNumber(angka) {
        return angka.replace(/[^,\d]/g, '');
    }
    </script> --}}
@endsection
