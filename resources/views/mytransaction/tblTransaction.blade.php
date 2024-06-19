@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transaction List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Transaction</li>
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
                    <!-- <div class="card-header text-right">
                        <a href="" class="btn btn-primary" role="button">Add</a>
                        <a href="" class="btn btn-primary" role="button">Trash</a>
                    </div> -->
                    <div class="card-body">
                        <table id="example1" class="table table-hover table-bordered" id="data-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <!-- <th>Id Transaction</th> -->
                                    <th>Id Order</th>
                                    <th>Peemesan</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                    <tr class="bg-dark">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name?? 'Uknown' }}</td>
                                        <td>{{ $item->order_date }}</td>
                                        <td>@currency( $item->quantity * $item->product->harga )</td>
                                        <td>{{ $item->status }}</td>
                                        <!-- <td> -->
                                            <!-- <a href="{{ route('orders.edit', ['order' => $item->id]) }}" class="btn btn-warning btn-sm" role="button">
                                                <i class="bi bi-pencil-square"></i> Edit -->
                                            </a>
                                            @if ($item->status === 'selesai' || $item->status === 'dibatalkan')
                                                <!-- Button trigger modal -->
                                                <!-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $loop->index }}">
                                                    Delete
                                                </button> -->

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure want to delete this data?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                <form action="{{ route('orders.delete', ['order' => $item->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm" role="button">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <div class="alert alert-danger">There are no orders.</div>
                                        </td>
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
            $('#food-table').DataTable();
        });
    </script>
@endsection
