@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Drinks Trash List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Drinks Trash</li>
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
            <form action="{{ route('drinks.forceDeleteAll') }}" method="POST" style="display:inline;" onclick="return confirm('Are you sure you want to delete all drinks? This action cannot be undone.')">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Delete All
                </button>
            </form>
            <form action="{{ route('drinks.restoreAll') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-recycle"></i> Restore All
                </button>
            </form>
            <a href="{{ route('drinks.index') }}" class="btn btn-primary" role="button">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="data-table">
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
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            @if($drink->image)
                                <img src="{{ asset($drink->image) }}" alt="{{ $drink->name }}" width="100">
                            @endif
                        </td>
                        <td>{{ $drink->name }}</td>
                        <td>{{ $drink->price }}</td>
                        <td>{!! $drink->description !!}</td>
                        <td>
                            <form action="{{ route('drinks.restore', $drink->id_drink) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="bi bi-recycle"></i> Restore
                                </button>
                            </form>
                            <form action="{{ route('drinks.forceDelete', $drink->id_drink) }}" method="POST" style="display:inline;" onclick="return confirm('Are you sure you want to permanently delete this drink?')">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">There is no data of drink.</td>
                    </tr>
                    @endforelse
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
    $('#data-table').DataTable();
  });
  </script>
   
@endsection
