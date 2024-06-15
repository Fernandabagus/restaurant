@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Foods</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <form action="{{ route('update-product', $product->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="img">Food Image</label>
                                <input type="file" class="form-control" name="img" onchange="loadFile(event)">
                                @if ($product->img)
                                                <img src="{{ asset($product->img) }}" alt="{{ $product->nama }}"
                                                    width="100">
                                            @endif
                                <img id="output" class="img-fluid mt-2 mb-4" width="100" />
                            </div>
                            <div class="form-group">
                                <label for="food_name">Food Name</label>
                                <input type="text" class="form-control" name="nama" id="food_name"
                                    required="required" value="{{ old('nama', $product->nama) }}" placeholder="Input food nama here"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="food_price_display">Harga</label>
                                <input type="text" id="food_price_display" class="form-control"
                                    required="required" value="{{ old('harga', number_format($product->harga, 0, ',', '.')) }}" placeholder="Input food price here">
                                <input type="hidden" name="harga" id="harga" value="{{ old('harga', $product->harga) }}">

                                <!-- Error Message -->
                                @error('harga')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
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
                                <label for="deskripsi">Description</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3"
                                    placeholder="Input food deskripsi here">{{ old('deskripsi', $product->deskripsi) }}</textarea>

                                <!-- Error Message -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <a href="{{ route('product-admin') }}" class="btn btn-outline-secondary mr-2"
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
    <script>
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
    </script>
@endsection
