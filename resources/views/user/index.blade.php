@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
            <a href="{{ route('createUsers') }}" class="btn btn-primary" role="button">
              <i class="bi bi-file-earmark-plus"></i> Add
            </a>
            <a href="{{ route('user.trash') }}" class="btn btn-primary" role="button">
              <i class="bi bi-recycle"></i> Trash
            </a>
          </div>
          <div class="card-body">

          <table id="user-table" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No.</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                  <tr class= "bg-dark">
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                      @if ($user->img)
                        <img src="{{ asset($user->img) }}" alt="{{ $user->name }}" width="100">
                      @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->role }}</td>
                    <td>

                      <a href="{{ route('editUsers', $user->id) }}" class="btn btn-warning btn-sm" role="button">
                        <i class="bi bi-pencil-square"></i> Edit
                      </a>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                      data-target="#exampleModal{{ $user->id }}">

                        Delete
                      </button>

                      <!-- Modal -->

                    <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
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
                              <p>Are you sure you want to delete this user?</p>
                            </div>
                            <div class="modal-footer">

                              <button type="button" class="btn btn-secondary btn-sm"
                              data-dismiss="modal">Close</button>
                              <form action="{{ route('deleteUsers', ['id' => $user->id]) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                role="button">Delete</button>

                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="9" class="text-center">No data available.</td>
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
