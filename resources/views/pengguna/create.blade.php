@extends('layouts.cms')


<!-- Custom styles for this template -->
<link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Permission</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('pengguna.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="nama_kategori">Nama Pengguna</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}" placeholder="Masukan nama">
                                        @error('email')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-2">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}" placeholder="Masukan email">
                                        @error('name')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-2">
                                        <label for="nama_kategori">Nama Permission</label>
                                        <select type="text" class="form-control" name="role" id="role"
                                            value="{{ old('role') }}" placeholder="Masukan nama">
                                            <option disabled selected>-- Choose one --</option>
                                            @foreach ($role as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-2">
                                        <label for="nama_kategori">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="{{ old('password') }}" placeholder="Masukan password">
                                        @error('password')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Submit
                                        </button>
                                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary w-100 mt-2">
                                            Batal
                                        </a>
                                    </div>
                                </form>
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
