@extends('layouts.cms')


<!-- Custom styles for this template -->
<link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Keuangan</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('keuangan.create') }}" class="btn btn-primary mb-2">Tambah keuangan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center">Nomor</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Jenis</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keuangan as $index => $item)
                                            <tr>
                                                <td class="sorting_1 text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ number_format($item->jumlah) }}</td>
                                                <td class="text-center">
                                                    @if ($item->jenis)
                                                        <div class="badge badge-danger">
                                                            Uang Keluar
                                                        </div>
                                                    @else
                                                        <div class="badge badge-success">
                                                            Uang Masuk
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $item->kategori->nama }}</td>
                                                <td class="text-center">{{ $item->tanggal }}</td>
                                                <td class="text-center">{{ $item->descripsi }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('keuangan.edit', $item) }}"
                                                        class="btn btn-success">Edit</a>
                                                    <form action="{{ route('keuangan.destroy', $item) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('yakin ingin mnghapus')"
                                                            class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sbadmin/js/demo/datatables-demo.js') }}"></script>
@endpush
