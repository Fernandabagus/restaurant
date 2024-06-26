@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Drinks</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Drinks</li>
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
                        <form action="{{ route('updateDrinks', $drink->id_drink) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">Drink Image</label>
                                <input type="file" class="form-control" name="image" onchange="loadFile(event)">
                                @if ($drink->image)
                                                <img src="{{ asset($drink->image) }}" alt="{{ $drink->name }}"
                                                    width="100">
                                            @endif
                                <img id="output" class="img-fluid mt-2 mb-4" width="100" />
                            </div>
                            <div class="form-group">
                                <label for="name">Drink Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    required="required" value="{{ old('name', $drink->name) }}" placeholder="Input drink price here"
                                    >
                            </div>
                            <div class="form-group">
                            <label for="drink_price_display">Price</label>
                            <input type="text" id="drink_price_display" class="form-control"
                                required="required" value="{{ old('price', 'Rp. ' . number_format($drink->price, 0, ',', '.')) }}" placeholder="Input drink price here">
                            <input type="hidden" name="price" id="price" value="{{ old('price', $drink->price) }}">

                            <!-- Error Message -->
                            @error('price')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="description" rows="3"
                                    placeholder="Input drink description here">{{ old('deskripsi', $drink->description) }}</textarea>

                                <!-- Error Message -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <a href="{{ route('daftarDrinks') }}" class="btn btn-outline-secondary mr-2"
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
    var drink_price_display = document.getElementById('drink_price_display');
    var price = document.getElementById('price');

    drink_price_display.addEventListener('keyup', function(e) {
        var formattedValue = formatRupiah(this.value, 'Rp. ');
        drink_price_display.value = formattedValue;
        price.value = formatNumber(this.value);
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