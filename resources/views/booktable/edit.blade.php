<!-- resources/views/admin/booking/edit.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Book A Table</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('order-list') }}">Book A Table</a></li>
                            <li class="breadcrumb-item active">Edit Book A Table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $booking->booking->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="varchar" class="form-control" id="phone" name="phone" value="{{ $booking->booking->phone }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="varchar" class="form-control" id="email" name="email" value="{{ $booking->booking->email }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="many_person">Many Person</label>
                                <input type="interger" class="form-control" id="many_person" name="many_person" value="{{ $booking->booking->person }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="book_date">Book Date</label>
                                <input type="date" class="form-control" id="book_date" name="book_date" value="{{ $booking->booking->book }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="sedang diproses" {{ $order->status === 'sedang diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                                    <option value="selesai" {{ $order->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $order->status === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
