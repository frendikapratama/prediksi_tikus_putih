<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\KategoriSize;
use App\Models\Jenis;
use Carbon\Carbon;
class KeuanganController extends Controller
{
    public function index()
    {

        Carbon::setLocale('id'); 
        $Keuangan = Keuangan::with('jenis', 'kategoriSize')
        ->orderBy('periode', 'desc')
        ->get()
        ->map(function ($item) {
            $item->periode = Carbon::createFromFormat('Y-m', $item->periode)->translatedFormat('F Y');
            return $item;
        });
        return view('keuangan.index', compact('Keuangan'));
    }
    public function create()
    {
        $jenis = Jenis::all();
        $kategoriSize = KategoriSize::all();
        return view('keuangan.create', compact('jenis', 'kategoriSize'));
    }
    public function store(Request $request)
    {
        Keuangan::create($request->all());
        return redirect()->route('keuangan.index')->with('success', 'Finance data added successfully.');
    }  
    public function destroy(Keuangan $Keuangan)
    {
        $Keuangan->delete();
        return redirect()->route('keuangan.index')->with('success', 'Data Pakan berhasil dihapus.');
    }  
    public function edit($id)
    {
        $keuangan = Keuangan::find($id);
        $jenis = Jenis::all();
        $kategoriSize = KategoriSize::all();
        return view('keuangan.edit', compact('keuangan', 'jenis', 'kategoriSize'));
    }

    public function update(Request $request, $id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->jenis_id = $request->jenis_id;
        $keuangan->kategori_size_id = $request->kategori_size_id;
        $keuangan->biaya_pakan = $request->biaya_pakan;
        $keuangan->biaya_lainnya = $request->biaya_lainnya;
        $keuangan->harga_pertikus = $request->harga_pertikus;
        $keuangan->pendapatan_bulanan = $request->pendapatan_bulanan;
        $keuangan->periode = $request->periode;
        $keuangan->save();
        return redirect()->route('keuangan.index')->with('success', 'Data keuangan berhasil diperbarui.');
    }
}
