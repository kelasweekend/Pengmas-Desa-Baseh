@extends('layouts.home')

@section('title')
          Wisata Desa Baseh
@endsection

@section('content')
          <section class="hero hero-lead hero-lead-1 bg-gray" id="hero">
                    <div class="hero-cotainer">
                              <div class="container">
                                        <div class="row">
                                                  <div class="col-12">
                                                            <div class="hero-content">
                                                                      <div id="map" data-url="{{ route('home.geojson') }}"></div>
                                                            </div>
                                                  </div>
                                        </div>
                                        <div class="shape-divider-bottom">
                                                  <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                                            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                                                                      class="shape-fill"></path>
                                                  </svg>
                                        </div>
                              </div>
          </section>
          <section class="processes" id="features">
                    <div class="container">
                              <div class="row clearfix">
                                        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                                                  <div class="heading heading-3 text-center">
                                                            <p class="heading-subtitle">Wisata Desa</p>
                                                            <h2 class="heading-title">Layanan Informasi Wisata Desa</h2>
                                                  </div>
                                        </div>
                              </div>
                              <div class="row justify-content-center mt-4 mb-4">
                                @forelse ($data as $blog)
                                          <div class="col-md-3 col-10">
                                                    <a href="{{ $blog->maps }}" target="_blank">
                                                              <div class="card rounded-20 shadow-sm p-3">
                                                                        <img src="{{ asset('cdn/wisata/' . $blog->image) }}" alt="{{ $blog->nama}}"
                                                                                  class="img-fluid rounded-20">
                                                                        <div class="artikel">
                                                                                  <h5 class="text-limit">{{ $blog->nama}}</h5>
                                                                                  <p class="text-limit mb-0">{{ $blog->deskripsi }}</p>
                                                                                  <hr>
                                                                                  <p class="text-muted mt-2 mb-0">Tiket : Rp. {{ number_format($blog->tiket) }}</p>
                                                                                  <p class="text-muted mt-0 mb-2">{{ $blog->alamat}}</p>
                                                                        </div>
                                                                        <hr class="mb-3">
                                                                        <small class="text-muted text-center">Lihat Maps</small>
                                                              </div>
                                                    </a>
                                          </div>
                                @empty
                                          <div class="col-md-3 col-12">
                                                    <img src="{{ asset('cdn/img/error.svg') }}" alt="Artikel Kosong">
                                          </div>
                                @endforelse
                      </div>
                    </div>
          </section>
@endsection

@section('css-tambahan')
          <!-- maps -->
          <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
                    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
          <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                    crossorigin=""></script>
          <!-- font -->
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
@endsection

@section('js-tambahan')
          <script type="text/javascript">
                    var map = L.map('map').setView([-7.3125011, 109.1966951], 14);

                    L.tileLayer(
                              'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoib2phbmFscGhhIiwiYSI6ImNreHR0ZGp1MzVuZGcyemt5MHg3Z2t4eHQifQ.peGpGa_e1Bs4amUI5AsDWQ', {
                                        attribution: 'Copyright &copy; <a href="#">Ojan Alpha</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                        maxZoom: 18,
                                        id: 'mapbox/streets-v11',
                                        tileSize: 512,
                                        zoomOffset: -1,
                                        accessToken: 'pk.eyJ1Ijoib2phbmFscGhhIiwiYSI6ImNreHR0ZGp1MzVuZGcyemt5MHg3Z2t4eHQifQ.peGpGa_e1Bs4amUI5AsDWQ'
                              }).addTo(map);

                    $(document).ready(function() {
                              var url = $("#map").attr("data-url");
                              $.get(url, function(data) {
                                        console.log(data);
                                        var markersOnMap = data;

                                        for (var i = 0; i < markersOnMap.length; i++) {
                                                  var contentString = '<div id="content"> <img src="' + markersOnMap[i].iniGambar +
                                                            '"width="300px" height="200px" style="border-radius:10px;"> <h3>' + markersOnMap[i]
                                                            .placeName +
                                                            '</h3>' + '<p>' + markersOnMap[i].contentText + '</p>';
                                                  L.marker([markersOnMap[i].LatLng['lat'], markersOnMap[i].LatLng['lng']]).addTo(
                                                            map).bindPopup(
                                                            contentString);
                                                  // console.log(markersOnMap[i].LatLng[0]['lat']);
                                        }
                              });
                    });
          </script>
@endsection
