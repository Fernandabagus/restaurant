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
                                <th>Status</th>
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
                                        

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $loop->index }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $loop->index }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
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