@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Menu List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
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
                        <a href="{{ route('create-product') }}" class="btn btn-primary" role="button">
                            <i class="bi bi-file-earmark-plus"></i> Add
                        </a>
                        <!-- <a href="{{ route('foods.trash') }}" class="btn btn-primary" role="button">
                            <i class="bi bi-recycle"></i> Trash
                        </a> -->
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $item)
                                    <tr class="bg-dark">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            @if ($item->img)
                                                <img src="{{ asset('storage/'.$item->img) }}" alt="{{ $item->nama }}"
                                                    width="100">
                                            @endif
                                        </td>
                                        <td>{{ $item->nama }}</td>
                                        <td>@currency($item->harga)</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>{!! $item->deskripsi !!}</td>
                                        <td>
                                            <a href="{{ route('edit-product', $item->id) }}" class="btn btn-warning btn-sm"
                                                role="button">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <!-- Button triger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#exampleModal{{ $loop->index }}">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $loop->index }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure want to delete this data?</p>
                                                            <p></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-dismiss="modal">Close</button>
                                                            {{-- <form action="{{ route('delete-product', $item->id) }}">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    role="button">Hapus</button>
                                                            </form> --}}
                                                            <form action="{{ route('delete-product', $item->id) }}"
                                                              method="POST">
                                                              @method('delete')
                                                              @csrf
                                                              <button type="submit"
                                                                  class="btn light btn-danger btn-xs btn-block" role="button">Delete</button>
                                                          </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        There no data of food.
                                    </div>

                            </tbody>
                            @endforelse
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
            $('#data-table').DataTable();
        });
    </script>
@endsection
