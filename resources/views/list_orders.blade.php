@extends('layouts.master')
@section('content')
@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('orders.create') }}" class="btn btn-primary" role="button">Add Order</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="order-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>User ID</th>
                                <th>Food</th>
                                <th>Drink</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td> {{ $loop->index + 1 }}</td>
                                    <td> {{ $order->user->name }}</td>
                                    <td> {{ $order->food->name }}</td>
                                    <td> {{ $order->drink->name }}</td>
                                    <td> {{ $order->quantity }}</td>
                                    <td> {{ $order->order_date }}</td>
                                    <td>
                                        <a href="{{ route('orders.edit', ['order' => $order->id]) }}"
                                            class="btn btn-warning btn-sm" role="button">Edit</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $loop->index }}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $loop->index }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $loop->index }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $loop->index }}">DELETE</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure want to delete this order?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-dismiss="modal">Close</button>
                                                        <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" role="button">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">There are no orders.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
      $(document).ready(function() {
          $('#order-table').DataTable();
      });
  </script>
@endsection

@endsection