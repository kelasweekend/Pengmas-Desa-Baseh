@extends('layouts.admin.master')
@section('title')
    Buat Wisata Desa Baru
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('wisata.index') }}">Wisata</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('wisata.store') }}" method="POST" class="form-horizontal"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label for="nama" class="form-label">Nama Wisata</label>
                                                <input type="text" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    placeholder="Ex Kebun Buah" autocomplete="off" required value="{{old('nama')}}">
                                                @error('nama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label for="alamat" class="form-label">Lokasi Wisata</label>
                                                <input type="text" name="alamat"
                                                    class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                                    placeholder="Ex Baseh" autocomplete="off" required value="{{old('alamat')}}">
                                                @error('alamat')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                                                <input type="text" name="deskripsi"
                                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                                    id="deskripsi" placeholder="Ex tentang singkat wisata tersebut"
                                                    autocomplete="off" required value="{{old('deskripsi')}}">
                                                @error('deskripsi')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label for="tiket" class="form-label">Harga Tiket Masuk</label>
                                                <input type="number" name="tiket"
                                                    class="form-control @error('tiket') is-invalid @enderror" id="tiket"
                                                    placeholder="Ex 10000" autocomplete="off" required value="{{old('tiket')}}">
                                                @error('tiket')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label for="maps" class="form-label">Masukan Maps</label>
                                                <input type="text" name="maps"
                                                    class="form-control @error('maps') is-invalid @enderror" id="maps"
                                                    placeholder="Masukan Embed Maps" autocomplete="off" required value="{{old('maps')}}">
                                                @error('maps')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label for="lat" class="form-label">Kordinat Latitude</label>
                                                <input type="text" name="lat"
                                                    class="form-control @error('lat') is-invalid @enderror" id="lat"
                                                    placeholder="Ex 10000" autocomplete="off" required value="{{old('lat')}}">
                                                @error('lat')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label for="lng" class="form-label">Kordinat Longitude</label>
                                                <input type="text" name="lng"
                                                    class="form-control @error('lng') is-invalid @enderror" id="lng"
                                                    placeholder="Masukan Embed lng" autocomplete="off" required value="{{old('lng')}}">
                                                @error('lng')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Masukan Gambar Wisata</label>
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('image') is-invalid @enderror"
                                                    name="image" id="image" required>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                                @error('image')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-secondary tombol float-right mt-3" type="submit">Submit</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('css-tambahan')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js-tambahan')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
