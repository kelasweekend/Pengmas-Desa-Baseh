<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Data\Kontak;
use App\Models\Desa\Informasi;
use App\Models\Desa\Wisata;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $info = Informasi::all();
        return view('home.index', compact('info'));
    }
    public function baca($slug_url)
    {
        $data = Informasi::where('slug_url', $slug_url)->first();
        if (empty($data)) {
            # jika link tidak ada maka
            return redirect()->route('home');
        } else {
            # jika link ada maka
            return view('home.baca_berita', compact('data'));
        }
    }

    public function wisata()
    {
        $data = Wisata::all();
        return view('home.wisata', compact('data'));
    }

    public function geojson(Request $request)
    {
        if ($request->ajax()) {
            # jika request dari ajak maka
            $data = Wisata::select('nama', 'lat', 'lng', 'image', 'alamat', 'maps')->get();
            $arr = [];
            foreach ($data as $tanya) {
                $geo = array(
                    'placeName' => $tanya['nama'],
                    'contentText' => $tanya['alamat'],
                    'lokasi' => $tanya['maps'],
                    'iniGambar' => asset('cdn/wisata/' . $tanya['image']),
                    'LatLng' => [
                        'lat' => $tanya['lat'],
                        'lng' => $tanya['lng']
                    ]
                );
                $arr[] = $geo;
            }
            // $pertanyaan = $;
            return response()->json($arr);
        } else {
            # jika bukan ajak maka
            return redirect()->route('home.wisata');
        }
    }
    
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|min:10',
            'email' => 'required',
            'body' => 'required'
        ]);
        Kontak::create([
            'nama_lengkap' => $request->name,
            'email' => $request->email,
            'body' => $request->body
        ]);

        return redirect()->route('home')->with('success', 'Pesan Terkirim');
    }
}
