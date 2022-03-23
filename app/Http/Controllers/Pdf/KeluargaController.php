<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Data\Kartu_keluarga;
use App\Models\Data\Keluarga;
use App\Models\Data\Komoditi;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class KeluargaController extends Controller
{
    public function index($id)
    {
        $data = Keluarga::find($id);
        $komoditi = Komoditi::where('keluarga_id', $data->id)->first();
        $kk = Kartu_keluarga::where('keluarga_id', $data->id)->get();
        // $view = view('pdf.keluarga');
        // // $pdf = PDF::loadHTML($view->render())->setPaper('a4', 'landscape');
        // // return $pdf->stream();

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadView('pdf.keluarga');
        // $pdf->setPaper('a4', 'landscape');
        // return $pdf->stream();
    return view('pdf.keluarga', compact('data', 'komoditi', 'kk'));
    }
}
