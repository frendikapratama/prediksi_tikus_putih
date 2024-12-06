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
        $pakans = Pakan::with(['jenis', 'kategoriSize'])->get();
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
        $pakan->created_at = Carbon::createFromFormat('Y-m', $request->created_at)->startOfMonth();
        $pakan->save();
        return redirect()->route('pakan.index')->with('success', 'Data Pakan berhasil diperbarui.');
    }

    public function destroy(Pakan $pakan)
    {
        $pakan->delete();
        return redirect()->route('pakan.index')->with('success', 'Data Pakan berhasil dihapus.');
    }
}
