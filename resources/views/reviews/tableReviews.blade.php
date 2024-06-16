@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reviews List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Reviews</li>
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
                    <!-- <div class="card-header text-right">
                        <a href="" class="btn btn-primary" role="button">Add</a>
                        <a href="" class="btn btn-primary" role="button">Trash</a>
                    </div> -->
                    <div class="card-body">
                        <table id="example1" class="table table-hover table-bordered" id="data-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
        @foreach ($reviews as $index => $review)
        <tr class="bg-dark">
                <td>{{ $index + 1 }}</td>
                <td>
                                            @if ($review->user->img)
                                                <img src="{{ asset($review->user->img) }}" alt="{{ $review->name }}"
                                                    width="100">
                                            @endif
                                        </td>
                <td>{{ $review->user->name }}</td>
                <td>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <i class="fa fa-star" style="color: gold;"></i>
                        @else
                            <i class="fa fa-star" style="color: lightgray;"></i>
                        @endif
                    @endfor
                </td>
                <td>{{ $review->comment }}</td>
            </tr>
        @endforeach
    </tbody>
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
            $('#review-table').DataTable();
        });
    </script>
@endsection
