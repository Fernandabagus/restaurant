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
                    <form action="{{ route('storeFoods') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="img_url">Food Image</label>
                            <input type="file" name="img_url" id="img_url" class="form-control-file" onchange="loadFile(event)">
                            <img id="output" class="img-fluid mt-2 mb-4" width="100" />
                        </div>

                        <div class="form-group">
                            <label for="food_name">Food Name</label>
                            <input type="text" name="food_name" id="food_name" class="form-control"
                                required="required" placeholder="Input food name here..">
                        </div>

                        <div class="form-group">
                            <label for="food_price_display">Price</label>
                            <input type="text" id="food_price_display" class="form-control"
                                required="required" placeholder="Input food price here..">
                            <input type="hidden" name="food_price" id="food_price">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control"
                                required="required" placeholder="Input food description here.."></textarea>
                        </div>

                        <div class="text-right">
                            <a href="{{ route('daftarFoods') }}" class="btn btn-outline-secondary mr-2"
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
