<!-- resources/views/user/trash.blade.php -->

@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order Trash List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Orders Trash</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-right">
                    <form action="{{ route('order.restoreAll') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-recycle"></i> Restore All
                        </button>
                    </form>
                    <a href="{{ route('order-list') }}" class="btn btn-primary" role="button">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="data-table">
                        <thead>
                            <tr>
                                    <th>No.</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Pemesan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-dark">
                            @forelse ($orders as $order)
                                <tr class="bg-dark">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $order->product->nama }}</td>
                                    <td>@currency($order->product->harga)</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <form action="{{ route('order.restore', $order->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="bi bi-recycle"></i> Restore
                                            </button>
                                        </form>
                                        <form action="{{ route('order.forceDelete', $order->id) }}" method="POST" style="display:inline;" onclick="return confirm('Are you sure you want to permanently delete this user?')">
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
