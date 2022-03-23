<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Data\Kartu_keluarga;
use App\Models\Data\Keluarga;
use App\Models\Data\Komoditi;
use App\Models\Desa\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RtController extends Controller
{
    public function index()
    {
        $dawis = Keluarga::all()->count();
        $wisata = Wisata::all()->count();
        $keluarga = Kartu_keluarga::all()->count();
        return view('role.rt.index', compact('dawis', 'wisata', 'keluarga'));
    }

    public function rekap()
    {
        $data = Keluarga::where('rt', auth()->user()->no_rt)->get();
        $sum_kk = Keluarga::where('rt', auth()->user()->no_rt)->sum('jumlah_kk');
        $sum_pria = Keluarga::where('rt', auth()->user()->no_rt)->sum('pria');
        $sum_wanita = Keluarga::where('rt', auth()->user()->no_rt)->sum('wanita');
        $sum_balita = Keluarga::where('rt', auth()->user()->no_rt)->sum('balita');
        $sum_pus = Keluarga::where('rt', auth()->user()->no_rt)->sum('pus');
        $sum_wus = Keluarga::where('rt', auth()->user()->no_rt)->sum('wus');
        $sum_susu = Keluarga::where('rt', auth()->user()->no_rt)->sum('ibu_menyusui');
        $sum_lansia = Keluarga::where('rt', auth()->user()->no_rt)->sum('lansia');
        $sum_buta = Keluarga::where('rt', auth()->user()->no_rt)->sum('buta');
        $sum_hamil = Keluarga::where('rt', auth()->user()->no_rt)->sum('ibu_hamil');
        return view('desa.rt.rekap', compact('data', 'sum_kk', 'sum_susu', 'sum_pria', 'sum_wanita', 'sum_balita', 'sum_pus', 'sum_wus', 'sum_hamil', 'sum_lansia', 'sum_buta', 'sum_hamil'));
    }

    public function dawis(Request $request)
    {
        if ($request->ajax()) {
            # jika request berasal dari ajax
            $data = Keluarga::where('rt', auth()->user()->no_rt)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn_1 = '<a href="' . route('rt.keluarga.view', $row->id) . '" class="edit btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Lihat</a>';
                    $actionBtn = $actionBtn_1 . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('rt.keluarga.destroy', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i> Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('desa.rt.dawis');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desa_wisma' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            // 
            'nama_kepala_keluarga' => 'required',
            'jumlah_anggota_keluarga' => 'required',
            'pria' => 'required',
            'wanita' => 'required',
            'jumlah_kk' => 'required',
            'balita' => 'required',
            'pus' => 'required',
            'wus' => 'required',
            'ibu_menyusui' => 'required',
            'lansia' => 'required',
            // 
            'buta' => 'required',
            'ibu_hamil' => 'required',
            'kebutuhan_khusus' => 'required',
            // 
            'makanan_pokok' => 'required',
            'jamban_keluarga' => 'required',
            'sumber_air' => 'required',
            'pembuangan_sampah' => 'required',
            'pembuangan_limbah' => 'required',
            'stiker_p4k' => 'required',
            'kegiatan_usaha_kesehatan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $id_k = Keluarga::create($request->all());
        $komoditi = Keluarga::find($id_k->id);
        $komoditi->komoditi()->create();
        return response()->json(['success' => 'Data Dawis Berhasil ditambahkan']);
    }

    // ============================== buat kartu keluarga ==================== //

    public function show($id, Request $request)
    {
        $data = Keluarga::find($id);
        $komoditi = Komoditi::where('keluarga_id', $data->id)->first();
        if ($request->ajax()) {
            # jika request berasal dari ajax
            $data = Kartu_keluarga::where('keluarga_id', $data->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('rt.keluarga.hapus_kk', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i> Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('desa.rt.view', compact('data', 'komoditi'));
        // dd($data);
    }

    public function store_kk(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor_kk' => 'required|unique:kartu_keluargas',
            'nama_lengkap' => 'required|unique:kartu_keluargas',
            'status_keluarga' => 'required',
            'status_perkawinan' => 'required',
            'kelamin' => 'required',
            'ttl' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $keluarga = Keluarga::find($id);
        $keluarga->kartu_keluarga()->create($request->all());
        return response()->json(['success' => 'Anggota Keluarga Berhasil ditambahkan']);
    }

    public function hapus_kk($id)
    {
        Kartu_keluarga::find($id)->delete();
        return response()->json(['success' => 'Anggota KK Berhasil dihapus']);
    }


    // ============================== Selesai Buat Kartu Keluarga ==================== //
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keluarga::find($id)->delete();
        return response()->json(['success' => 'Dawis Berhasil dihapus']);
    }

    // update komoditi
    public function komoditi(Request $request, $id)
    {
        $keluarga = Keluarga::find($id);
        Komoditi::updateOrCreate([
            'keluarga_id' => $id
        ], [
            'komoditi_peternakan' => $request->komoditi_peternakan,
            'volume_peternakan' => $request->volume_peternakan,
            // perikanan
            'komoditi_perikanan' => $request->komoditi_perikanan,
            'volume_perikanan' => $request->volume_perikanan,
            // warung
            'komoditi_warung' => $request->komoditi_warung,
            'volume_warung' => $request->volume_warung,
            // toga
            'komoditi_toga' => $request->komoditi_toga,
            'volume_toga' => $request->volume_toga,
            // lumbung hidup
            'komoditi_lumbung' => $request->komoditi_lumbung,
            'volume_lumbung' => $request->volume_lumbung,
            // tanaman
            'komoditi_tanaman' => $request->komoditi_tanaman,
            'volume_tanaman' => $request->volume_tanaman,
            // pangan
            'komoditi_pangan' => $request->komoditi_pangan,
            'volume_pangan' => $request->volume_pangan,
            // sandang
            'komoditi_sandang' => $request->komoditi_sandang,
            'volume_sandang' => $request->volume_sandang,
            // jasa
            'komoditi_jasa' => $request->komoditi_jasa,
            'volume_jasa' => $request->volume_jasa,
            // lainnya
            'komoditi_lainnya' => $request->komoditi_lainnya,
            'volume_lainnya' => $request->volume_lainnya,
        ]);
        return redirect()->back();
    }
}
