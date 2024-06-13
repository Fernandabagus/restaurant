@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Drinks List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Drinks</li>
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
        <a href="{{route('createDrinks')}}" class="btn btn-primary" role="button">Add</a>
        <a href="{{ route('trashDrinks') }}" class="btn btn-primary" role="button">Trash</a>

    </div>
    <div class="card-body">
        <table id="example1" class="table table-hover table-bordered" id="data-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Drinks</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($drinks as $drink)
                
                <tr class="bg-dark">
                        <td> {{ $loop->index + 1 }}</td>
                        <td>
                        @if($drink->image)
                            <img src="{{ asset($drink->image) }}" alt="{{ $drink->name }}" width="100">
                        @endif
                        </td>
                        <td> {{ $drink->name }}</td>
                        <td> @currency($drink->price)</td>
                        <td> {!! $drink->description !!} </td>
                        <td cols="2">
                        <a href="{{ route('editDrinks', ['id' => $drink->id_drink]) }}"
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
                                                                action="{{ route('deleteDrinks', ['id' => $drink->id_drink]) }}">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    role="button">Hapus</button>
                                                            </form>
                          </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    There no data of drink.
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
    $('#drink-table').DataTable();
  });
  </script>
   
@endsection

