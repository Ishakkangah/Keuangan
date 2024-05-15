@extends('layouts.cms')


<!-- Custom styles for this template -->
<link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@section('content')
    <div class="container-fluid">
        @include('kategori.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Keuangan</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('keuangan.update', $keuangan) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    {{-- JUMLAH --}}
                                    <div class="form-group mb-2">
                                        <label for="nama_kategori">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah" id="jumlah"
                                            value="{{ old('jumlah', $keuangan->jumlah) }}" placeholder="Masukan jumlah">
                                        @error('jumlah')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- JENS --}}
                                    <div class="form-group mb-2">
                                        <label for="jenis">Jenis</label>
                                        <select class="form-control" name="jenis" id="jenis"
                                            value="{{ old('jenis') }}" placeholder="Masukan jenis">
                                            <option disabled selected>-- Choose one --</option>
                                            <option value="0" {{ $keuangan->id_pengguna == 0 ? 'selected' : '' }}>Uang
                                                masuk</option>
                                            <option value="1" {{ $keuangan->id_pengguna == 1 ? 'selected' : '' }}>Uang
                                                keluar</option>
                                        </select>
                                        @error('jenis')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="id_kategori">kategori</label>
                                        <select class="form-control" name="id_kategori" id="id_kategori"
                                            value="{{ old('id_kategori') }}" placeholder="Masukan kategori">
                                            <option disabled selected>-- Choose one --</option>
                                            @foreach ($kategori as $kat)
                                                <option {{ $kat->id == $keuangan->id_kategori ? 'selected' : '' }}
                                                    value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_kategori')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{-- DESCRIPSI --}}
                                    <div class="form-group mb-2">
                                        <label for="descripsi">Deskripsi</label>
                                        <textarea class="form-control" name="descripsi" id="descripsi" placeholder="Masukkan deskripsi">{{ old('descripsi', $keuangan->descripsi) }}</textarea>

                                        @error('descripsi')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-2">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Submit
                                        </button>
                                        <a href="{{ route('keuangan.index') }}" class="btn btn-secondary w-100 mt-2">
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
