<!DOCTYPE html>
<html lang="en">

<head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
                    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
          <title>Rekap RW</title>
</head>

<style>
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
          <h1 class="text-center">DATA RUKUN WARGA</h1>
          <h2 class="text-center">REKAP DATA WARGA RUKUN WARGA {{ auth()->user()->no_rw }}</h2>
          <hr>
          <!-- end header -->
          <div class="container">
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
                                                            <td>{{ $item->nama_kepala_keluarga }}</td>
                                                            <td>{{ $item->jumlah_kk }}</td>
                                                            <td>{{ $item->pria }}</td>
                                                            <td>{{ $item->wanita }}</td>
                                                            <td>{{ $item->balita }}</td>
                                                            <td>{{ $item->pus }}</td>
                                                            <td>{{ $item->wus }}</td>
                                                            <td>{{ $item->ibu_menyusui }}</td>
                                                            <td>{{ $item->lansia }}</td>
                                                            <td>{{ $item->buta}}</td>
                                                            <td>{{ $item->ibu_hamil }}</td>
                                                  </tr>
                                        @endforeach
                              </tbody>
                              <tfoot>
                                        <tr>
                                                  <th colspan="3">Jumlah</th>
                                                  <th>{{ $sum_kk }}</th>
                                                  <th>{{ $sum_pria }}</th>
                                                  <th>{{ $sum_wanita }}</th>
                                                  <th>{{ $sum_balita }}</th>
                                                  <th>{{ $sum_pus }}</th>
                                                  <th>{{ $sum_wus }}</th>
                                                  <th>{{ $sum_susu }}</th>
                                                  <th>{{ $sum_lansia }}</th>
                                                  <th>{{ $sum_buta }}</th>
                                                  <th>{{ $sum_hamil }}</th>
                                        </tr>
                              </tfoot>
                    </table>
                    <hr>
                    <p class="text-primary">di cetak pada : {{date('Y-m-d')}} Oleh : {{ auth()->user()->name }}</p>
          </div>
          {{-- data --}}

          {{-- end data --}}

          <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
          <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous">
          </script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                    crossorigin="anonymous">
          </script>
</body>

</html>
