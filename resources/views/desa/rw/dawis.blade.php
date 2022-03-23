@extends('layouts.admin.master')
@section('title')
          Data Keluarga RW {{ auth()->user()->no_rw }}
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
                                                                                <button type="button" class="btn btn-primary btn-sm float-right" id="createNewItem"><i
                                                                                                    class="fas fa-plus mr-2"></i>Buat Baru</button>
                                                                      </div>
                                                                      <!-- /.card-header -->
                                                                      <div class="card-body">
                                                                                <table class="table table-bordered table-hover datatable">
                                                                                          <thead>
                                                                                                    <tr>
                                                                                                              <th>No</th>
                                                                                                              <th>Nama Wisma</th>
                                                                                                              <th>RT</th>
                                                                                                              <th>Kepala Keluarga</th>
                                                                                                              <th>anggota keluarga</th>
                                                                                                              <th>Action</th>
                                                                                                    </tr>
                                                                                          </thead>
                                                                                          <tbody>

                                                                                          </tbody>
                                                                                          <tfoot>
                                                                                                    <tr>
                                                                                                              <th>No</th>
                                                                                                              <th>Nama Wisma</th>
                                                                                                              <th>RT</th>
                                                                                                              <th>Kepala Keluarga</th>
                                                                                                              <th>anggota keluarga</th>
                                                                                                              <th>Action</th>
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
          {{-- ajax dataa --}}
          <div class="modal fade" id="ajaxModel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
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
                                                                      <div class="col-md-4">
                                                                                <div class="mb-2">
                                                                                          <label for="desa_wisma" class="form-label">Desa Wisma</label>
                                                                                          <input type="text" name="desa_wisma" class="form-control" id="desa_wisma" placeholder="Ex Kenanga"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="rt" class="form-label">RT</label>
                                                                                          <input type="number" name="rt" class="form-control" id="rt" readonly
                                                                                                    value="{{ auth()->user()->no_rt }}" autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="rw" class="form-label">RW</label>
                                                                                          <input type="number" name="rw" class="form-control" id="rw" readonly
                                                                                                    value="{{ auth()->user()->no_rw }}" autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-3">
                                                                                <div class="mb-2">
                                                                                          <label for="desa" class="form-label">Nama Desa</label>
                                                                                          <input type="text" name="desa" class="form-control" id="desa" placeholder="Ex Baseh"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-3">
                                                                                <div class="mb-2">
                                                                                          <label for="kecamatan" class="form-label">Nama Kecamatan</label>
                                                                                          <input type="text" name="kecamatan" class="form-control" id="kecamatan"
                                                                                                    placeholder="Ex Kedung Banteng" autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                            </div>

                                                            <div class="row">
                                                                      <div class="col-md-4">
                                                                                <div class="mb-2">
                                                                                          <label for="nama_kepala_keluarga" class="form-label">Kepala Keluarga</label>
                                                                                          <input type="text" name="nama_kepala_keluarga" class="form-control" id="nama_kepala_keluarga"
                                                                                                    placeholder="Ex Budi" autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="jumlah_anggota_keluarga" class="form-label">Keluarga</label>
                                                                                          <input type="number" name="jumlah_anggota_keluarga" class="form-control"
                                                                                                    id="jumlah_anggota_keluarga" placeholder="Ex 1" autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="pria" class="form-label">Pria</label>
                                                                                          <input type="number" name="pria" class="form-control" id="pria" placeholder="Ex 2"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="wanita" class="form-label">Wanita</label>
                                                                                          <input type="number" name="wanita" class="form-control" id="wanita" placeholder="Ex Baseh"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="jumlah_kk" class="form-label">KK</label>
                                                                                          <input type="number" name="jumlah_kk" class="form-control" id="jumlah_kk" placeholder="Ex Baseh"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="balita" class="form-label">Balita</label>
                                                                                          <input type="number" name="balita" class="form-control" id="balita" placeholder="Ex Baseh"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="pus" class="form-label">Pus</label>
                                                                                          <input type="number" name="pus" class="form-control" id="pus" placeholder="Ex Baseh"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="wus" class="form-label">Wus</label>
                                                                                          <input type="number" name="wus" class="form-control" id="wus" placeholder="Ex Baseh"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="lansia" class="form-label">Lansia</label>
                                                                                          <input type="number" name="lansia" class="form-control" id="lansia" placeholder="Ex Baseh"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                      <div class="col-md-2">
                                                                                <p>Kebutuhan Khusus ?</p>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="kebutuhan_khusus" id="kebutuhan_khusus1"
                                                                                                    value="1">
                                                                                          <label class="form-check-label" for="kebutuhan_khusus1">
                                                                                                    Fisik
                                                                                          </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="kebutuhan_khusus" id="kebutuhan_khusus2"
                                                                                                    value="0">
                                                                                          <label class="form-check-label" for="kebutuhan_khusus2">
                                                                                                    Non Fisik
                                                                                          </label>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="ibu_hamil" class="form-label">Hamil</label>
                                                                                          <input type="number" name="ibu_hamil" class="form-control" id="ibu_hamil" placeholder="Ex Baseh"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="ibu_menyusui" class="form-label">Menyusui</label>
                                                                                          <input type="number" name="ibu_menyusui" class="form-control" id="ibu_menyusui"
                                                                                                    placeholder="Ex Baseh" autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <div class="mb-2">
                                                                                          <label for="buta" class="form-label">Buta</label>
                                                                                          <input type="number" name="buta" class="form-control" id="buta" placeholder="Ex Baseh"
                                                                                                    autocomplete="off" required>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-2">
                                                                                <p>Makanan Pokok ?</p>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="makanan_pokok" id="makanan_pokok1"
                                                                                                    value="beras">
                                                                                          <label class="form-check-label" for="makanan_pokok1">
                                                                                                    Beras
                                                                                          </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="makanan_pokok" id="makanan_pokok2"
                                                                                                    value="non beras">
                                                                                          <label class="form-check-label" for="makanan_pokok2">
                                                                                                    Non Beras
                                                                                          </label>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-2">
                                                                                <p>Jamban Kelurga ?</p>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="jamban_keluarga" id="jamban_keluarga1"
                                                                                                    value="1">
                                                                                          <label class="form-check-label" for="jamban_keluarga1">
                                                                                                    Ya
                                                                                          </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="jamban_keluarga" id="jamban_keluarga2"
                                                                                                    value="0">
                                                                                          <label class="form-check-label" for="jamban_keluarga2">
                                                                                                    Tidak
                                                                                          </label>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-2">
                                                                                <p>Sumber Air ?</p>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="sumber_air" id="sumber_air1" value="pam">
                                                                                          <label class="form-check-label" for="sumber_air1">
                                                                                                    Pam
                                                                                          </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="sumber_air" id="sumber_air2" value="sumur">
                                                                                          <label class="form-check-label" for="sumber_air2">
                                                                                                    Sumur
                                                                                          </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="text" name="sumber_air" id="sumber_air3" style="width: 100px" placeholder="lainnya">
                                                                                          {{-- <label class="form-check-label" for="sumber_air2">
                                                                                                    Lainnya
                                                                                          </label> --}}
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-1">
                                                                                <p>Pembuangan Sampah ?</p>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="pembuangan_sampah" id="pembuangan_sampah1"
                                                                                                    value="1">
                                                                                          <label class="form-check-label" for="pembuangan_sampah1">
                                                                                                    Ya
                                                                                          </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="pembuangan_sampah" id="pembuangan_sampah2"
                                                                                                    value="0">
                                                                                          <label class="form-check-label" for="pembuangan_sampah2">
                                                                                                    Tidak
                                                                                          </label>
                                                                                </div>
                                                                      </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                      <div class="col-md-4">
                                                                                <p>Pembuangan Air Limbah ?</p>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="pembuangan_limbah" id="pembuangan_limbah1"
                                                                                                    value="1">
                                                                                          <label class="form-check-label" for="pembuangan_limbah1">
                                                                                                    Ya
                                                                                          </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="pembuangan_limbah" id="pembuangan_limbah2"
                                                                                                    value="0">
                                                                                          <label class="form-check-label" for="pembuangan_limbah2">
                                                                                                    Tidak
                                                                                          </label>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-4">
                                                                                <p>Stiker P4K ?</p>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="stiker_p4k" id="stiker_p4k1" value="1">
                                                                                          <label class="form-check-label" for="stiker_p4k1">
                                                                                                    Ya
                                                                                          </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="stiker_p4k" id="stiker_p4k2" value="0">
                                                                                          <label class="form-check-label" for="stiker_p4k2">
                                                                                                    Tidak
                                                                                          </label>
                                                                                </div>
                                                                      </div>
                                                                      <div class="col-md-4">
                                                                                <p>Usaha Kesehatan ?</p>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="kegiatan_usaha_kesehatan"
                                                                                                    id="kegiatan_usaha_kesehatan1" value="1">
                                                                                          <label class="form-check-label" for="kegiatan_usaha_kesehatan1">
                                                                                                    Ya
                                                                                          </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="kegiatan_usaha_kesehatan"
                                                                                                    id="kegiatan_usaha_kesehatan2" value="0">
                                                                                          <label class="form-check-label" for="kegiatan_usaha_kesehatan2">
                                                                                                    Tidak
                                                                                          </label>
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
          <link rel="stylesheet" href="{{ asset('assets/theme/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
          <link rel="stylesheet" href="{{ asset('assets/theme/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
          <link rel="stylesheet" href="{{ asset('assets/theme/datatables/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
                                        ajax: "{{ route('rw.keluarga') }}",
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
                                                            data: 'desa_wisma',
                                                            name: 'desa_wisma'
                                                  },
                                                  {
                                                            data: 'rt',
                                                            name: 'rt'
                                                  },
                                                  {
                                                            data: 'nama_kepala_keluarga',
                                                            name: 'nama_kepala_keluarga'
                                                  },
                                                  {
                                                            data: 'jumlah_anggota_keluarga',
                                                            name: 'jumlah_anggota_keluarga'
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
                                                  url: "{{ route('rw.keluarga.store') }}",
                                                  type: "POST",
                                                  dataType: 'json',
                                                  success: function(response) {
                                                            if (response.success) {
                                                                      Swal.fire({
                                                                                icon: "success",
                                                                                title: "Selamat",
                                                                                text: response
                                                                                          .success
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
                                                                                if (response
                                                                                          .success) {
                                                                                          Swal.fire({
                                                                                                    icon: "success",
                                                                                                    title: "Selamat",
                                                                                                    text: response
                                                                                                              .success
                                                                                          });
                                                                                          $('#ItemForm')
                                                                                                    .trigger(
                                                                                                              "reset");
                                                                                          $('#ajaxModel')
                                                                                                    .modal(
                                                                                                              'hide');
                                                                                          table
                                                                                .draw();
                                                                                } else {
                                                                                          Swal.fire({
                                                                                                    icon: "error",
                                                                                                    title: "Mohon Maaf !",
                                                                                                    text: response
                                                                                                              .error
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
