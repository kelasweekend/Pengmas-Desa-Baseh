@extends('layouts.home')

@section('title')
          Berita : {{ $data->title }}
@endsection

@section('content')
          <section class="hero hero-lead hero-lead-1 bg-gray" id="hero">
                    <div class="hero-cotainer mt-5">
                              <div class="container">
                                        <div class="row justify-content-center">
                                                  <div class="col-md-10 col-12">
                                                            <div class="card rounded-20 shadow-sm p-3">
                                                                      <img src="{{ asset('cdn/blog/' . $data->image) }}" alt="{{ $data->title }}" class="rounded-20 mb-3" height="500">
                                                                      <h1 class="hero-title text-center">{{ $data->title }}</h1>
                                                                      <hr>
                                                                      {!! $data->body !!}
                                                                      <hr>
                                                                      <div class="sharethis-inline-reaction-buttons"></div>
                                                            </div>
                                                  </div>
                                        </div>
                              </div>
                    </div>
          </section>
          {{-- <section class="processes" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="p-3">
                        <img src="{{ asset('cdn/blog/' . $data->image) }}" alt="{{ $data->title }}"
                            class="rounded-20 mb-3 mx-auto d-block">
                        {!! $data->body !!}

                        <div class="d-flex justify-content-between mt-4 mb-0">
                            <a href="{{ route('home')}}" class="btn btn-secondary">Kembali</a>
                            <a href="{{route('home.wisata')}}" class="btn btn-secondary">Wisata</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
