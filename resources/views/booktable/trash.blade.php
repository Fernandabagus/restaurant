<!-- resources/views/booktable/trash.blade.php -->

@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Booking Trash List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Booking Trash</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-right">
                    <form action="{{ route('booking.restoreAll') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-recycle"></i> Restore All
                        </button>
                    </form>
                    <a href="{{ route('booking-list') }}" class="btn btn-primary" role="button">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="data-table">
                        <thead>
                            <tr>
                            <th>No.</th>
                                    <th>Customer</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Many Person</th>
                                    <th>Status</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-dark">
                        @forelse ($booking as $item)
                                    <tr class="bg-dark">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->user->name}}</td>
                                        <td>{{ $item->booking->nama }}</td>
                                        <td>@currency($item->booking->phone)</td>
                                        <td>{{ $item->quantity}}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                        <form action="{{ route('booking.restore', $booking->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="bi bi-recycle"></i> Restore
                                            </button>
                                        </form>
                                        <form action="{{ route('booking.forceDelete', $booking->id) }}" method="POST" style="display:inline;" onclick="return confirm('Are you sure you want to permanently delete this book a table?')">
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
                                    <td colspan="5" class="text-center">There is no data of book a table.</td>
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
