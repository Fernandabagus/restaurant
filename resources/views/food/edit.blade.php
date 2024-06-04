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
                        <form action="{{ route('updateFoods', $food->id_food) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="img_url">Food Image</label>
                                <input type="file" class="form-control" name="img_url">
                            </div>
                            <div class="form-group">
                                <label for="food_name">Food Name</label>
                                <input type="text" class="form-control" name="food_name" id="food_name"
                                    required="required" value="{{ old('name', $food->name) }}" placeholder="Input food price here"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="food_price">Price</label>
                                <input type="text" name="food_price" id="food_price" class="form-control"
                                    required="required" value="{{ old('price', $food->price) }}" placeholder="Input food price here">

                                <!-- Error Message -->
                                @error('price')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="description" rows="3"
                                    placeholder="Input food description here">{{ old('deskripsi', $food->description) }}</textarea>

                                <!-- Error Message -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <a href="{{ route('daftarFoods') }}" class="btn btn-outline-secondary mr-2"
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
@endsection
