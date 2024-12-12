<?php
namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\Jenis;
use App\Models\KategoriSize;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PakanController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
    
        // Ambil data paginasi dan modifikasi langsung dengan transform()
        $pakans = Pakan::with('jenis', 'kategoriSize')
            ->orderBy('periode', 'desc')
            ->paginate(10);
    
        // Transform data langsung dalam koleksi
        $pakans->getCollection()->transform(function ($item) {
            $item->periode = Carbon::createFromFormat('Y-m', $item->periode)->translatedFormat('F Y');
            return $item;
        });
    
        return view('pakan.index', compact('pakans'));
    }

    public function create()
    {
        $jenis = Jenis::all();
        $kategoriSize = KategoriSize::all();
        return view('pakan.create', compact('jenis', 'kategoriSize'));
    }

    public function store(Request $request)
    {
        Pakan::create($request->all());
        return redirect()->route('pakan.index')->with('success', 'Data Pakan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pakan = Pakan::find($id);
        $jenis = Jenis::all();
        $kategoriSize = KategoriSize::all();
        return view('pakan.edit', compact('pakan', 'jenis', 'kategoriSize'));
    }

    public function update(Request $request, $id)
    {
        $pakan = Pakan::findOrFail($id);
        $pakan->jenis_id = $request->jenis_id;
        $pakan->kategori_size_id = $request->kategori_size_id;
        $pakan->banyak_pakan_per_tikus = $request->banyak_pakan_per_tikus;
        $pakan->jumlah_pemberian_pakan = $request->jumlah_pemberian_pakan;
        $pakan->periode = $request->periode;
        $pakan->save();
        return redirect()->route('pakan.index')->with('success', 'Data Pakan berhasil diperbarui.');
    }

    public function destroy(Pakan $pakan)
    {
        $pakan->delete();
        return redirect()->route('pakan.index')->with('success', 'Data Pakan berhasil dihapus.');
    }
}
