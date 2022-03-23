@extends('layouts.admin.master')
@section('title')
    Data : {{ $data->desa_wisma }}
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
                                <a href="javascript:var page = window.open('{{route('rt.keluarga.pdf', $data->id)}}'); page.print()" class="btn btn-outline-primary btn-sm waves-effect waves-light float-right ml-2">Cetak PDF</a>
                                <button type="button" class="btn btn-primary btn-sm float-right" id="createNewItem"><i
                                        class="fas fa-plus mr-2"></i>Tambah KK</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- form --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label for="desa_wisma" class="form-label">Desa Wisma</label>
                                            <input type="text" value="{{ $data->desa_wisma }}" name="desa_wisma"
                                                class="form-control" id="desa_wisma" placeholder="Ex Kenanga"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="rt" class="form-label">RT</label>
                                            <input type="number" disabled readonly value="{{ $data->rt }}" name="rt"
                                                class="form-control" id="rt" placeholder="Ex 1" autocomplete="off"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="rw" class="form-label">RW</label>
                                            <input type="number" disabled readonly name="rw" value="{{ $data->rw }}"
                                                class="form-control" id="rw" placeholder="Ex 2" autocomplete="off"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label for="desa" class="form-label">Nama Desa</label>
                                            <input type="text" name="desa" value="{{ $data->desa }}"
                                                class="form-control" id="desa" placeholder="Ex Baseh" autocomplete="off"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label for="kecamatan" class="form-label">Nama Kecamatan</label>
                                            <input type="text" name="kecamatan" value="{{ $data->kecamatan }}"
                                                class="form-control" id="kecamatan" placeholder="Ex Kedung Banteng"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label for="nama_kepala_keluarga" class="form-label">Kepala Keluarga</label>
                                            <input type="text" name="nama_kepala_keluarga"
                                                value="{{ $data->nama_kepala_keluarga }}" class="form-control"
                                                id="nama_kepala_keluarga" placeholder="Ex Budi" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="jumlah_anggota_keluarga" class="form-label">Keluarga</label>
                                            <input type="number" name="jumlah_anggota_keluarga"
                                                value="{{ $data->jumlah_anggota_keluarga }}" class="form-control"
                                                id="jumlah_anggota_keluarga" placeholder="Ex 1" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="pria" class="form-label">Pria</label>
                                            <input type="number" name="pria" value="{{ $data->pria }}"
                                                class="form-control" id="pria" placeholder="Ex 2" autocomplete="off"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="wanita" class="form-label">Wanita</label>
                                            <input type="number" name="wanita" class="form-control"
                                                value="{{ $data->wanita }}" id="wanita" placeholder="Ex Baseh"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="jumlah_kk" class="form-label">KK</label>
                                            <input type="number" name="jumlah_kk" class="form-control"
                                                value="{{ $data->jumlah_kk }}" id="jumlah_kk" placeholder="Ex Baseh"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="balita" class="form-label">Balita</label>
                                            <input type="number" name="balita" class="form-control"
                                                value="{{ $data->balita }}" id="balita" placeholder="Ex Baseh"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="pus" class="form-label">Pus</label>
                                            <input type="number" name="pus" class="form-control" id="pus"
                                                value="{{ $data->pus }}" placeholder="Ex Baseh" autocomplete="off"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="wus" class="form-label">Wus</label>
                                            <input type="number" name="wus" class="form-control" id="wus"
                                                value="{{ $data->wus }}" placeholder="Ex Baseh" autocomplete="off"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2">
                                            <label for="lansia" class="form-label">Lansia</label>
                                            <input type="number" name="lansia" class="form-control" id="lansia"
                                                value="{{ $data->lansia }}" placeholder="Ex Baseh" autocomplete="off"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table class="table table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor KK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Lahir</th>
                                            <th>JK</th>
                                            <th>Status Keluarga</th>
                                            <th>Status Pernikahan</th>
                                            <th>Pendidikan</th>
                                            <th>Pekerjaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor KK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Lahir</th>
                                            <th>JK</th>
                                            <th>Status Keluarga</th>
                                            <th>Status Pernikahan</th>
                                            <th>Pendidikan</th>
                                            <th>Pekerjaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <hr>
                                <h6 class="font-weight-bold text-primary">Pemanfaatan Tanah Pekarangan dan Industri
                                    Rumah Tangga</h6>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Komoditi</th>
                                            <th scope="col">Volume</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="{{ route('rt.keluarga.komoditi', $data->id) }}" method="POST">
                                            @csrf
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Peternakan</td>
                                                <td><input type="text" class="form-control" name="komoditi_peternakan"
                                                        value="{{ $komoditi->komoditi_peternakan }}"></td>
                                                <td><input type="number" class="form-control" name="volume_peternakan"
                                                        value="{{ $komoditi->volume_peternakan }}"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Perikanan</td>
                                                <td><input type="text" class="form-control" name="komoditi_perikanan"
                                                        value="{{ $komoditi->komoditi_perikanan }}"></td>
                                                <td><input type="number" class="form-control" name="volume_perikanan"
                                                        value="{{ $komoditi->volume_perikanan }}"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Warung Hidup</td>
                                                <td><input type="text" class="form-control" name="komoditi_warung"
                                                        value="{{ $komoditi->komoditi_warung }}"></td>
                                                <td><input type="number" class="form-control" name="volume_warung"
                                                        value="{{ $komoditi->volume_warung }}"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Toga</td>
                                                <td><input type="text" class="form-control" name="komoditi_toga"
                                                        value="{{ $komoditi->komoditi_toga }}"></td>
                                                <td><input type="number" class="form-control" name="volume_toga"
                                                        value="{{ $komoditi->volume_toga }}"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Lumbung Hidup</td>
                                                <td><input type="text" class="form-control" name="komoditi_lumbung"
                                                        value="{{ $komoditi->komoditi_lumbung }}"></td>
                                                <td><input type="number" class="form-control" name="volume_lumbung"
                                                        value="{{ $komoditi->volume_lumbung }}"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Tanaman Keras</td>
                                                <td><input type="text" class="form-control" name="komoditi_tanaman"
                                                        value="{{ $komoditi->komoditi_tanaman }}"></td>
                                                <td><input type="number" class="form-control" name="volume_tanaman"
                                                        value="{{ $komoditi->volume_tanaman }}"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>Pangan</td>
                                                <td><input type="text" class="form-control" name="komoditi_pangan"
                                                        value="{{ $komoditi->komoditi_pangan }}"></td>
                                                <td><input type="number" class="form-control" name="volume_pangan"
                                                        value="{{ $komoditi->volume_pangan }}"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>Sandang</td>
                                                <td><input type="text" class="form-control" name="komoditi_sandang"
                                                        value="{{ $komoditi->komoditi_sandang }}"></td>
                                                <td><input type="number" class="form-control" name="volume_sandang"
                                                        value="{{ $komoditi->volume_sandang }}"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td>Jasa</td>
                                                <td><input type="text" class="form-control" name="komoditi_jasa"
                                                        value="{{ $komoditi->komoditi_jasa }}"></td>
                                                <td><input type="number" class="form-control" name="volume_jasa"
                                                        value="{{ $komoditi->volume_jasa }}"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td>Lainnya</td>
                                                <td><input type="text" class="form-control" name="komoditi_lainnya"
                                                        value="{{ $komoditi->komoditi_lainnya }}"></td>
                                                <td><input type="number" class="form-control" name="volume_lainnya"
                                                        value="{{ $komoditi->volume_lainnya }}"></td>
                                            </tr>
                                            <tr>
                                                <th colspan="4">
                                                    <button type="submit" class="btn btn-primary btn-sm float-right"
                                                        id="createIndustri">Update Data</button>
                                                </th>
                                            </tr>
                                        </form>
                                    </tbody>
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
    {{-- ajax dataa --}}
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ItemForm" name="ItemForm" class="form-horizontal">
                        <input type="hidden" name="Item_id" id="Item_id">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="nomor_kk" class="form-label">Nomor NIK</label>
                                    <input type="number" name="nomor_kk" class="form-control" id="nomor_kk"
                                        placeholder="Ex 3212xxx" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                        placeholder="Ex Budi Setiaji" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="status_keluarga" class="form-label">Status Keluarga</label>
                                    <input type="text" name="status_keluarga" class="form-control" id="status_keluarga"
                                        placeholder="Ex Suami" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status Penikahan ?</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            name="status_perkawinan">
                                            <option value="kawin">Kawin</option>
                                            <option value="belum kawin">Belum Kawin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin ?</label>
                                        <select class="form-control" id="jenis_kelamin" name="kelamin">
                                            <option value="L">Laki Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="ttl" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="ttl" class="form-control" id="ttl" placeholder="Ex Suami"
                                        max="{{ date('Y-m-d') }}" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="pendidikan" class="form-label">Pendidikan ?</label>
                                    <input type="text" name="pendidikan" class="form-control" id="pendidikan"
                                        placeholder="Ex SD/SMP/SMA/S1" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="pekerjaan" class="form-label">Pekerjaan ?</label>
                                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan"
                                        placeholder="Ex Petani" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-secondary tombol float-right mt-3" id="saveBtn" value="create"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css-tambahan')
    <link rel="stylesheet"
        href="{{ asset('assets/theme/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/theme/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/theme/datatables/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('js-tambahan')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/theme/datatables/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/theme/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/theme/datatables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/theme/datatables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Page specific script -->
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('rt.keluarga.view', $data->id) }}",
                pageLength: 5,
                lengthMenu: [5, 10, 20, 50, 100, 200, 500],
                responsive: true,
                lengthChange: true,
                autoWidth: true,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nomor_kk',
                        name: 'nomor_kk'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'ttl',
                        name: 'ttl'
                    },
                    {
                        data: 'kelamin',
                        name: 'kelamin'
                    },
                    {
                        data: 'status_keluarga',
                        name: 'status_keluarga'
                    },
                    {
                        data: 'status_perkawinan',
                        name: 'status_perkawinan'
                    },
                    {
                        data: 'pendidikan',
                        name: 'pendidikan'
                    },
                    {
                        data: 'pekerjaan',
                        name: 'pekerjaan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
            $('#createNewItem').click(function() {
                $('#saveBtn').val("create-Item");
                $('#Item_id').val('');
                $('#ItemForm').trigger("reset");
                $('#modelHeading').html("Tambah Data");
                $('.tombol').html("Submit");
                $('#ajaxModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $('#ItemForm').serialize(),
                    url: "{{ route('rt.keluarga.store_kk', $data->id) }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: "success",
                                title: "Selamat",
                                text: response.success
                            });
                            $('#ItemForm').trigger("reset");
                            $('#ajaxModel').modal('hide');
                            table.draw();
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Mohon Maaf !",
                                text: response.error
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!"
                        });
                    }
                });
            });
            $('body').on('click', '.deleteItem', function() {

                var Item_id = $(this).data("id");
                var url = $(this).data("url");
                Swal.fire({
                    title: 'Apakah Anda Yakin ?',
                    text: "Anda Akan Menghapus data Ini !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus Segera'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Selamat",
                                        text: response.success
                                    });
                                    $('#ItemForm').trigger("reset");
                                    $('#ajaxModel').modal('hide');
                                    table.draw();
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Mohon Maaf !",
                                        text: response.error
                                    });
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Something went wrong!"
                                });
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
