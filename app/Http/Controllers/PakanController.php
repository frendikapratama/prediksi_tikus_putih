<?php
namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\Jenis;
use App\Models\KategoriSize;
use Illuminate\Http\Request;

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

    public function edit(Pakan $pakan)
    {
        $jenis = Jenis::all();
        $kategoriSize = KategoriSize::all();
        return view('pakan.edit', compact('pakan', 'jenis', 'kategoriSize'));
    }

    public function update(Request $request, Pakan $pakan)
    {
        $pakan->update($request->all());
        return redirect()->route('pakan.index')->with('success', 'Data Pakan berhasil diperbarui.');
    }

    public function destroy(Pakan $pakan)
    {
        $pakan->delete();
        return redirect()->route('pakan.index')->with('success', 'Data Pakan berhasil dihapus.');
    }
}
