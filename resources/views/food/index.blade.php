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
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
                        <a href="{{ route('createFoods') }}" class="btn btn-primary" role="button">Add</a>
                        <a href="{{ route('trashFoods') }}" class="btn btn-primary" role="button">Trash</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-hover table-bordered" id="data-table">
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
                                    <tr class="bg-dark">
                                        <td> {{ $loop->index + 1 }}</td>
                                        <td>
                                            @if ($food->img_url)
                                                <img src="{{ asset($food->img_url) }}" alt="{{ $food->name }}"
                                                    width="100">
                                            @endif
                                        </td>
                                        <td> {{ $food->name }}</td>
                                        <td> @currency($food->price)</td>
                                        <td> {!! $food->description !!} </td>
                                        <td cols="2">
                                            <a href="{{ route('editFoods', ['id' => $food->id]) }}"
                                                class="btn btn-warning btn-sm" role="button">Edit</a>
                                            <!-- Button triger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#exampleModal{{ $loop->index }}">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $loop->index }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure want to delete this data?</p>
                                                            <p></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-dismiss="modal">Close</button>
                                                            <form
                                                                action="{{ route('deleteFoods', ['id' => $food->id]) }}">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    role="button">Hapus</button>
                                                            </form>
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
