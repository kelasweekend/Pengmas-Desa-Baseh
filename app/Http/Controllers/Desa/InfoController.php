<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Desa\Informasi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InfoController extends Controller
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
            $data = Informasi::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn_1 = '<a href="' . route('info.edit', $row->id) . '" class="edit btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Lihat</a>';
                    $actionBtn = $actionBtn_1 . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('info.destroy', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i> Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('desa.info.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desa.info.create');
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
            'title' => 'required',
            'kategori' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);
        // dd($request->all());
        $poster = time() . '.' . $request->image->extension();
        Informasi::create([
            'title' => $request->title,
            'slug_url' => str_replace(' ', '-', $request->title),
            'kategori' => $request->kategori,
            'body' => $request->body,
            'image' => $poster,
        ]);
        $request->image->move(public_path('cdn/blog/'), $poster);
        return redirect()->route('info.index')->with('success', 'Informasi berhasil diupload');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Informasi::find($id);
        if (empty($data)) {
            # redirect data
            return redirect()->route('info.index')->with('error', 'Informasi Tidak ditemukan');
        } else {
            # info ada
            return view('desa.info.edit', compact('data'));
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
        $data = Informasi::find($id);
        if (empty($data)) {
            # jika kosong maka
            return redirect()->route('info.index')->with('error', 'info Tidak ditemukan');
        } else {
            # tidak kosong maka
            $request->validate([
                'title' => 'required',
                'kategori' => 'required',
                'body' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg',
            ]);

            if ($request->image == "") {
                # jika request image tidak ada maka
                $data->update([
                    'title' => $request->title,
                    'slug_url' => str_replace(' ', '-', $request->title),
                    'kategori' => $request->kategori,
                    'body' => $request->body,
                ]);
            } else {
                # jika ada request image

                // ================= hapus image dulu ======================
                $before_image = public_path('cdn/blog/' . $data->image);
                unlink($before_image);

                // ================ image baru upload =======================

                $poster = time() . '.' . $request->image->extension();
                $data->update([
                    'title' => $request->title,
                    'slug_url' => str_replace(' ', '-', $request->title),
                    'kategori' => $request->kategori,
                    'body' => $request->body,
                    'image' => $poster,
                ]);
                $request->image->move(public_path('cdn/blog/'), $poster);
            }

            return redirect()->route('info.index')->with('success', 'info berhasil diupdate');
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
        $data = Informasi::find($id);
        if (empty($data)) {
            # jika data kosong maka
            return redirect()->route('info.index')->with('error', 'info Tidak ditemukan');
        } else {
            # jika data ada maka
            $before_image = public_path('cdn/blog/' . $data->image);
            unlink($before_image);
            $data->delete();
            return response()->json(['success' => 'Informasi Berhasil dihapus']);
        }
    }
}
