@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Foods</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Foods</li>
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
                        <form action="{{ route('store-product') }}" method="post" enctype="multipart/form-data">
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
                                <label for="img_url">Food Image</label>
                                <input type="file" name="img" class="form-control-file" onchange="loadFile(event)">
                                <img id="output" class="img-fluid mt-2 mb-4" width="100" />
                            </div>

                            <div class="form-group">
                                <label for="food_name">Product Name</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required="required"
                                    placeholder="Input food name here..">
                            </div>

                            <div class="form-group">
                                <label for="food_price_display">Price</label>
                                <input type="text" class="form-control rupiah" value="{{ old('harga') }}" required="required"
                                    name="harga">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                                <select name="kategori" class="form-control" aria-label="Default select example">
                                    <option disabled selected value>
                                        <- Choose ->
                                    </option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="deskripsi" id="description" rows="3" class="form-control" required="required"
                                    >{{ old('deskripsi') }}</textarea>
                            </div>

                            <div class="text-right">
                                <a href="{{ route('product-admin') }}" class="btn btn-outline-secondary mr-2"
                                    role="button">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        /* Format Rupiah */
        var food_price_display = document.getElementById('food_price_display');
        var food_price = document.getElementById('food_price');

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
    </script>

@endsection
