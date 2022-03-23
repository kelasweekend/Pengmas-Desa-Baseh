<html>

<head>
          <!-- Required meta tags -->
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
                    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
          <title>Data Keluarga</title>
</head>

<style>
          p {
                    margin: 0;
                    font-weight: 500;
          }

          .laki {
                    margin-left: 145px;
          }

          .perempuan {
                    margin-left: 135px;
          }

          .kk {
                    margin-left: 135px;
          }

          h1 {
                    font-size: 18px;
                    margin-top: 5px;
          }

          h2 {
                    font-size: 15px;
          }

</style>

<body>
          <!-- header -->
          <h1 class="text-center">DATA KELUARGA</h1>
          <h2 class="text-center">( DI ISI OLEH KADER, SUMBER KEPALA KELUARGA / KADER )</h2>
          <hr>
          <!-- end header -->

          <!-- isi data -->
          <div class="container-fluid">
                    <div class="d-flex justify-content-start">
                              <p class="mr-2">DESA WISMA :</p>
                              <p class="text-primary">{{ $data->desa_wisma }}</p>

                    </div>
                    <div class="d-flex">
                              <P>RT :
                              <p class="text-primary mr-2 ml-2">{{ $data->rt }}</p> RW : <p class="text-primary ml-2">{{ $data->rw }}</p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>DESA :
                              <p class="text-primary mr-2">{{ $data->desa }}</p> KECAMATAN : <p class="text-primary ml-2">{{ $data->kecamatan }}</p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>KABUPATEN BANYUMAS PROVINSI JAWA TENGAH</P>
                    </div>
                    <div class="d-flex">
                              <P class="mr-2">NAMA KEPALA RUMAH TANGGA :
                              <p class="text-primary">{{ $data->nama_kepala_keluarga }}</p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>JUMLAH ANGGOTA KELUARGA :
                              <p class="text-primary mr-2 ml-2">{{ $data->jumlah_anggota_keluarga }}</p> ORANG</P>
                    </div>
                    <div class="d-flex">
                              <P class="laki">LAKI - LAKI :
                              <p class="text-primary mr-2 ml-2">{{ $data->pria }}</p> ORANG</P>
                    </div>
                    <div class="d-flex">
                              <P class="perempuan">PEREMPUAN :
                              <p class="text-primary mr-2 ml-2">{{ $data->wanita }}</p> ORANG</P>
                    </div>
                    <div class="d-flex">
                              <P>1) JUMLAH KK :
                              <p class="text-primary mr-2 kk">{{ $data->jumlah_kk }}</p> KK</P>
                    </div>
                    <P>2) JUMLAH</P>
                    <div class="ml-3">
                              <div class="d-flex">
                                        <div class="satu">
                                                  <div class="d-flex">
                                                            <p>a) BALITA :
                                                            <p class="mr-2 ml-2 text-primary">{{ $data->balita }}</p>
                                                            ANAK</p>
                                                  </div>
                                                  <div class="d-flex">
                                                            <p>b) PUS :
                                                            <p class="mr-2 ml-2 text-primary">{{ $data->pus }}</p>
                                                            PASANG</p>
                                                  </div>
                                        </div>
                                        <div class="dua ml-3">
                                                  <div class="d-flex">
                                                            <p>c) WUS :
                                                            <p class="mr-2 ml-2 text-primary">{{ $data->wus }}</p>
                                                            ORANG</p>
                                                  </div>
                                                  <div class="d-flex">
                                                            <p>d) IBU MENYUSUI :
                                                            <p class="mr-2 ml-2 text-primary">{{ $data->ibu_menyusui }}</p>
                                                            ORANG</p>
                                                  </div>
                                        </div>
                                        <div class="tiga ml-3">
                                                  <div class="d-flex">
                                                            <p>e) LANSIA :
                                                            <p class="mr-2 ml-2 text-primary">{{ $data->lansia }}</p>
                                                            ORANG</p>
                                                  </div>
                                                  <div class="d-flex">
                                                            <p>f) BUTA :
                                                            <p class="mr-2 ml-2 text-primary">{{ $data->buta }}</p>
                                                            ORANG</p>
                                                  </div>
                                        </div>
                                        <div class="empat ml-3">
                                                  <div class="d-flex">
                                                            <p>h) IBU HAMIL :
                                                            <p class="mr-2 ml-2 text-primary">{{ $data->ibu_hamil }}</p>
                                                            ORANG</p>
                                                  </div>
                                        </div>
                              </div>
                    </div>
                    <!-- tabel kartu kk -->
                    <hr>
                    <h6 class="font-weight-bold text-primary">Data Anggota Keluarga</h6>
                    <table class="table table-bordered mt-3">
                              <thead>
                                        <tr>
                                                  <th scope="col">Nomor KK</th>
                                                  <th scope="col">Nama Lengkap</th>
                                                  <th scope="col">Tanggal Lahir</th>
                                                  <th scope="col">JK</th>
                                                  <th scope="col">Status Keluarga</th>
                                                  <th scope="col">Status Pernikahan</th>
                                                  <th scope="col">Pendidikan</th>
                                                  <th scope="col">Pekerjaan</th>
                                        </tr>
                              </thead>
                              <tbody>
                                        @foreach ($kk as $item)
                                                  <tr>
                                                            <td>{{ $item->nomor_kk }}</td>
                                                            <td>{{ $item->nama_lengkap }}</td>
                                                            <td>{{ $item->ttl }}</td>
                                                            <td>{{ $item->kelamin }}</td>
                                                            <td>{{ $item->status_keluarga }}</td>
                                                            <td>{{ $item->status_perkawinan }}</td>
                                                            <td>{{ $item->pendidikan }}</td>
                                                            <td>{{ $item->pekerjaan }}</td>
                                                  </tr>
                                        @endforeach
                              </tbody>
                    </table>
                    <hr>
                    <!-- pookok -->
                    <div class="d-flex">
                              <P>3) MAKANAN POKOK :
                              <p class="text-primary mr-2 ml-2">{{ $data->makanan_pokok }}</p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>4) MEMPUNYAI JAMBAN KELUARGA :
                              <p class="text-primary mr-2 ml-2">
                                        @if ($data->jamban_keluarga == 1)
                                                  YA
                                        @else
                                                  TIDAK
                                        @endif
                              </p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>5) SUMBER AIR KELUARGA :
                              <p class="text-primary mr-2 ml-2">{{ $data->sumber_air }}</p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>6) MEMILIKI TENPAT PEMBUANGAN SAMPAH :
                              <p class="text-primary mr-2 ml-2">
                                        @if ($data->pembuangan_sampah == 1)
                                                  YA
                                        @else
                                                  TIDAK
                                        @endif
                              </p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>7) MEMPUNYAI SALURAN PEMBUANGAN AIR LIMBAH :
                              <p class="text-primary mr-2 ml-2">
                                        @if ($data->pembuangan_limbah == 1)
                                                  YA
                                        @else
                                                  TIDAK
                                        @endif
                              </p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>8) MENEMPEL STIKER P4K :
                              <p class="text-primary mr-2 ml-2">
                                        @if ($data->stiker_p4k == 1)
                                                  YA
                                        @else
                                                  TIDAK
                                        @endif
                              </p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>9) KEBUTUHAN KHUSUS :
                              <p class="text-primary mr-2 ml-2">
                                        @if ($data->kebutuhan_khusus == 1)
                                                  YA
                                        @else
                                                  TIDAK
                                        @endif
                              </p>
                              </P>
                    </div>
                    <div class="d-flex">
                              <P>10) KEGIATAN USAHA KESEHATAN LINGKUNGAN :
                              <p class="text-primary mr-2 ml-2">
                                        @if ($data->kegiatan_usaha_kesehatan == 1)
                                                  YA
                                        @else
                                                  TIDAK
                                        @endif
                              </p>
                              </P>
                    </div>
                    {{-- tabel komoditi --}}
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
                                        <tr>
                                                  <th scope="row">1</th>
                                                  <td>Peternakan</td>
                                                  <td>{{ $komoditi->komoditi_peternakan }}</td>
                                                  <td>{{ $komoditi->volume_peternakan }}</td>
                                        </tr>
                                        <tr>
                                                  <th scope="row">2</th>
                                                  <td>Perikanan</td>
                                                  <td>{{ $komoditi->komoditi_perikanan }}</td>
                                                  <td>{{ $komoditi->volume_perikanan }}</td>
                                        </tr>
                                        <tr>
                                                  <th scope="row">3</th>
                                                  <td>Warung Hidup</td>
                                                  <td>{{ $komoditi->komoditi_warung }}</td>
                                                  <td>{{ $komoditi->volume_warung }}</td>
                                        </tr>
                                        <tr>
                                                  <th scope="row">4</th>
                                                  <td>Toga</td>
                                                  <td>{{ $komoditi->komoditi_toga }}</td>
                                                  <td>{{ $komoditi->volume_toga }}</td>
                                        </tr>
                                        <tr>
                                                  <th scope="row">5</th>
                                                  <td>Lumbung Hidup</td>
                                                  <td>{{ $komoditi->komoditi_lumbung }}</td>
                                                  <td>{{ $komoditi->volume_lumbung }}</td>
                                        </tr>
                                        <tr>
                                                  <th scope="row">6</th>
                                                  <td>Tanaman Keras</td>
                                                  <td>{{ $komoditi->komoditi_tanaman }}</td>
                                                  <td>{{ $komoditi->volume_tanaman }}</td>
                                        </tr>
                                        <tr>
                                                  <th scope="row">7</th>
                                                  <td>Pangan</td>
                                                  <td>{{ $komoditi->komoditi_pangan }}</td>
                                                  <td>{{ $komoditi->volume_pangan }}</td>
                                        </tr>
                                        <tr>
                                                  <th scope="row">8</th>
                                                  <td>Sandang</td>
                                                  <td>{{ $komoditi->komoditi_sandang }}</td>
                                                  <td>{{ $komoditi->volume_sandang }}</td>
                                        </tr>
                                        <tr>
                                                  <th scope="row">9</th>
                                                  <td>Jasa</td>
                                                  <td>{{ $komoditi->komoditi_jasa }}</td>
                                                  <td>{{ $komoditi->volume_jasa }}</td>
                                        </tr>
                                        <tr>
                                                  <th scope="row">10</th>
                                                  <td>Lainnya</td>
                                                  <td>{{ $komoditi->komoditi_lainnya }}</td>
                                                  <td>{{ $komoditi->volume_lainnya }}</td>
                                        </tr>
                              </tbody>
                    </table>
          </div>
          <!-- end data -->
          <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
          <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous">
          </script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                    crossorigin="anonymous">
          </script>
</body>

</html>
