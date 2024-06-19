<!-- resources/views/admin/order/edit.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('order-list') }}">Orders</a></li>
                            <li class="breadcrumb-item active">Edit Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama_menu">Nama Menu</label>
                                <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ $order->product->nama }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" value="{{ $order->product->harga }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="pemesan">Pemesan</label>
                                <input type="text" class="form-control" id="pemesan" name="pemesan" value="{{ $order->user->name }}" readonly>
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
