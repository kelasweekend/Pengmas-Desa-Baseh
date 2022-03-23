<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Data\Keluarga;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index_rt()
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
        return view('pdf.rekap', compact('data', 'sum_kk', 'sum_susu', 'sum_pria', 'sum_wanita', 'sum_balita', 'sum_pus', 'sum_wus', 'sum_hamil', 'sum_lansia', 'sum_buta', 'sum_hamil'));
    }
    public function index_rw()
    {
        $data = Keluarga::where('rw', auth()->user()->no_rt)->orderBy('rt', 'ASC')->get();
        $sum_kk = Keluarga::where('rw', auth()->user()->no_rt)->sum('jumlah_kk');
        $sum_pria = Keluarga::where('rw', auth()->user()->no_rt)->sum('pria');
        $sum_wanita = Keluarga::where('rw', auth()->user()->no_rt)->sum('wanita');
        $sum_balita = Keluarga::where('rw', auth()->user()->no_rt)->sum('balita');
        $sum_pus = Keluarga::where('rw', auth()->user()->no_rt)->sum('pus');
        $sum_wus = Keluarga::where('rw', auth()->user()->no_rt)->sum('wus');
        $sum_susu = Keluarga::where('rw', auth()->user()->no_rt)->sum('ibu_menyusui');
        $sum_lansia = Keluarga::where('rw', auth()->user()->no_rt)->sum('lansia');
        $sum_buta = Keluarga::where('rw', auth()->user()->no_rt)->sum('buta');
        $sum_hamil = Keluarga::where('rw', auth()->user()->no_rt)->sum('ibu_hamil');
        return view('pdf.rekap-rw', compact('data', 'sum_kk', 'sum_susu', 'sum_pria', 'sum_wanita', 'sum_balita', 'sum_pus', 'sum_wus', 'sum_hamil', 'sum_lansia', 'sum_buta', 'sum_hamil'));
    }
}
