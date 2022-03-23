<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Desa\Wisata;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            # jika request berasal dari ajax
            $data = Wisata::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn_1 = '<a href="' . route('wisata.edit', $row->id) . '" class="edit btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Edit</a>';
                    $actionBtn = $actionBtn_1 . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('wisata.destroy', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i> Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('desa.wisata.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desa.wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tiket' => 'required|numeric|min:4',
            'alamat' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'maps' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);
        // dd($request->all());
        $poster = time() . '.' . $request->image->extension();

        Wisata::create([
            'nama' => $request->nama,
            'slug_wisata' => str_replace('-',' ', $request->nama),
            'deskripsi' => $request->nama,
            'tiket' => $request->tiket,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'alamat' => $request->alamat,
            'maps' => $request->maps,
            'image' => $poster,
        ]);

        $request->image->move(public_path('cdn/wisata/'), $poster);
        return redirect()->route('wisata.index')->with('success', 'wisata berhasil diulpload');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Wisata::find($id);
        if (empty($data)) {
            # redirect data
            return redirect()->route('wisata.index')->with('error', 'Wisata Tidak ditemukan');
        } else {
            # wisata ada
            return view('desa.wisata.edit', compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Wisata::find($id);
        if (empty($data)) {
            # jika kosong maka
            return redirect()->route('wisata.index')->with('error', 'Wisata Tidak ditemukan');
        } else {
            # tidak kosong maka
            $request->validate([
                'nama' => 'required',
                'deskripsi' => 'required',
                'tiket' => 'required|numeric|min:4',
                'alamat' => 'required',
                'lat' => 'required',
                'lng' => 'required',
                'maps' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg',
            ]);

            if ($request->image == "") {
                # jika request image tidak ada maka
                $data->update([
                    'nama' => $request->nama,
                    'slug_wisata' => str_replace('-',' ', $request->nama),
                    'deskripsi' => $request->nama,
                    'tiket' => $request->tiket,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'alamat' => $request->alamat
                ]);
            } else {
                # jika ada request image

                // ================= hapus image dulu ======================
                $before_image = public_path('cdn/wisata/' . $data->image);
                unlink($before_image);

                // ================ image baru upload =======================

                $poster = time() . '.' . $request->image->extension();
                $data->update([
                    'nama' => $request->nama,
                    'slug_wisata' => str_replace('-',' ', $request->nama),
                    'deskripsi' => $request->nama,
                    'tiket' => $request->tiket,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'alamat' => $request->alamat,
                    'maps' => $request->maps,
                    'image' => $poster,
                ]);
                $request->image->move(public_path('cdn/wisata/'), $poster);
            }

            return redirect()->route('wisata.index')->with('success', 'wisata berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wisata::find($id);
        if (empty($data)) {
            # jika data kosong maka
            return redirect()->route('wisata.index')->with('error', 'Wisata Tidak ditemukan');
        } else {
            # jika data ada maka
            $before_image = public_path('cdn/wisata/' . $data->image);
            unlink($before_image);
            $data->delete();
            return response()->json(['success' => 'Wisata Berhasil dihapus']);
        }
        
    }
}
