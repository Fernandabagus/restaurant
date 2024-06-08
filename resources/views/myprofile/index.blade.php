<!-- resources/views/myprofile/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">My Profile</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Username: {{ $user->username }}</p>
            <p class="card-text">Phone: {{ $user->phone }}</p>

            <a href="{{ route('myprofile.edit') }}" class="btn btn-primary">Edit Profile</a>

            <form action="{{ route('myprofile.destroy') }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
            </form>
        </div>
    </div>
</div>
@endsection
