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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
                    <form action="{{ route('storeDrinks') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="image">Drinks Image</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="drink_name">Drinks Name</label>
                            <input type="text" name="drink_name" id="drink_name" class="form-control"
                                required="required" placeholder="Input food name here">
                        </div>

                        <div class="form-group">
                            <label for="drink_price">Price</label>
                            <input type="text" name="drink_price" id="drink_price" class="form-control"
                                required="required" placeholder="Input food price here">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control"
                                required="required" placeholder="Input food description here"></textarea>
                        </div>

                        <div class="text-right">
                            <a href="{{ route('drinks.index') }}" class="btn btn-outline-secondary mr-2"
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

@endsection
