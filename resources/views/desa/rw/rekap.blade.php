@extends('layouts.admin.master')
@section('title')
    Rekap Warga RW {{ auth()->user()->no_rw }}
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
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
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
                            <div class="card-header">
                                <a href="javascript:var page = window.open('{{route('rw.rekap.pdf')}}'); page.print()" class="btn btn-outline-primary btn-sm waves-effect waves-light float-right ml-2">Cetak PDF</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No RT</th>
                                            <th>Nama</th>
                                            <th>Jml KK</th>
                                            <th>L</th>
                                            <th>P</th>
                                            <th>BLT</th>
                                            <th>PUS</th>
                                            <th>WUS</th>
                                            <th>IBU.M</th>
                                            <th>LS</th>
                                            <th>BUTA</th>
                                            <th>IBU.H</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>RT - {{ $item->rt }}</td>
                                                <td>{{$item->nama_kepala_keluarga}}</td>
                                                <td>{{$item->jumlah_kk}}</td>
                                                <td>{{$item->pria}}</td>
                                                <td>{{$item->wanita}}</td>
                                                <td>{{$item->balita}}</td>
                                                <td>{{$item->pus}}</td>
                                                <td>{{$item->wus}}</td>
                                                <td>{{$item->ibu_menyusui}}</td>
                                                <td>{{$item->lansia}}</td>
                                                <td>{{ $item->buta}}</td>
                                                <td>{{$item->ibu_hamil}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Jumlah</th>
                                            <th>{{$sum_kk}}</th>
                                            <th>{{$sum_pria}}</th>
                                            <th>{{$sum_wanita}}</th>
                                            <th>{{$sum_balita}}</th>
                                            <th>{{$sum_pus}}</th>
                                            <th>{{$sum_wus}}</th>
                                            <th>{{$sum_susu}}</th>
                                            <th>{{$sum_lansia}}</th>
                                            <th>{{$sum_buta}}</th>
                                            <th>{{$sum_hamil}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
