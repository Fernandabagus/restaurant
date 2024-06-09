@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('myprofile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        @if ($user->img)
            <div class="form-group">
                <img src="{{ asset('storage/' . $user->img) }}" alt="Profile Photo" width="150">
            </div>
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
        </div>

        <div class="form-group">
            <label for="img">Profile Photo</label>
            <input type="file" name="img" class="form-control">
        </div>

       

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
