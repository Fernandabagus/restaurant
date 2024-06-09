<!-- resources/views/myprofile/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">My Profile</h1>
    
    <div class="card">
        <div class="card-body">
            @if ($user->img)
                <img src="{{ asset('storage/img' . $user->img) }}" class="img-thumbnail mb-3" alt="img" style="max-width: 150px;">
            @else
                <img src="{{ asset('images/default-profile.png') }}" class="img-thumbnail mb-3" alt="Default img" style="max-width: 150px;">
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $user->address }}</td>
                </tr>
            </table>

            <a href="{{ route('myprofile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>

            <form action="{{ route('myprofile.destroy') }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
            </form>
        </div>
    </div>
</div>
@endsection
