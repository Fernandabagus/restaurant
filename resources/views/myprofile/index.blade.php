@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Profile</h1>
    <div class="card">
        <div class="card-body">
        @if ($user->img)
                <img src="{{ asset('storage/' . $user->img) }}" alt="Profile Photo" width="150">
            @endif
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Username:</strong> {{ $user->username }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $user->phone }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
           
            <a href="{{ route('myprofile.edit') }}" class="btn btn-primary">Edit Profile</a>

            <!-- Form for deleting the account -->
            <form action="{{ route('myprofile.destroy') }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
        </div>
    </div>
</div>
@endsection
