@extends('layouts.master')
@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Create User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container mt-5">
        <div class="card">
          <div class="card-header">Create User</div>
          <div class="card-body">
            <form action="{{ route('storeUsers') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="img">Image</label>
                <input type="file" name="img" class="form-control">
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Create User</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- rawrr -->
@endsection
