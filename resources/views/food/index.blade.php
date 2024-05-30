@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Foods List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Foods</li>
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
         <div class="card-header text-right">
        <a href="{{route('createFoods')}}" class="btn btn-primary" role="button">Add Foods</a>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered" id="data-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Foods</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($foods as $food)
                
                <tr>
                        <td> {{ $loop->index + 1 }}</td>
                        <td>
                        @if($food->img_url)
                            <img src="{{ asset($food->img_url) }}" alt="{{ $food->name }}" width="100">
                        @endif
                        </td>
                        <td> {{ $food->name }}</td>
                        <td> {{ $food->price }}</td>
                        <td> {!! $food->description !!} </td>
                        <td cols="2">
                            <a href="#" class="btn btn-warning btn-sm" role="button">Edit</a>
                            <a onclick="confirmDelete(this)"
                            data-url="#"
                            class="btn btn-danger btn-sm" role="button">Hapus</a>
                          </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    There no data of food.
                </div>
                
            
            </tbody>
            @endforelse
        </table>
    </div>
    </div>
         </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  $(document).ready(function() {
    $('#food-table').DataTable();
  });
  </script>
   
@endsection
