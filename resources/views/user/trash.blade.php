<!-- resources/views/user/trash.blade.php -->

@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Trash List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users Trash</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-right">
                    <form action="{{ route('users.restoreAll') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-recycle"></i> Restore All
                        </button>
                    </form>
                    <form action="{{ route('users.forceDeleteAll') }}" method="POST" style="display:inline;" onclick="return confirm('Are you sure you want to delete all users? This action cannot be undone.')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Delete All
                        </button>
                    </form>
                    <a href="{{ route('daftarUsers') }}" class="btn btn-primary" role="button">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">


            <thead class= "bg-dark">
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
                                        <form action="{{ route('users.restore', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="bi bi-recycle"></i> Restore
                                            </button>
                                        </form>
                                        <form action="{{ route('users.forceDelete', $user->id) }}" method="POST" style="display:inline;" onclick="return confirm('Are you sure you want to permanently delete this user?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">There is no data of user.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#data-table').DataTable();
    });
</script>
@endsection
