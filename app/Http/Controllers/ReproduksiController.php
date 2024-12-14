<?php
namespace App\Http\Controllers;
use App\Models\Reproduksi;
use App\Models\Jenis;
use App\Models\KategoriSize;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReproduksiController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
    
        // Ambil data paginasi dan modifikasi langsung dengan transform()
        $reproduksis = Reproduksi::with('jenis',)
            ->orderBy('periode', 'desc')
            ->paginate(10);
    
        // Transform data langsung dalam koleksi
        $reproduksis->getCollection()->transform(function ($item) {
            $item->periode = Carbon::createFromFormat('Y-m', $item->periode)->translatedFormat('F Y');
            return $item;
        });
    
        return view('reproduksi.index', compact('reproduksis'));
    }

    public function create()
    {
        $jenis = Jenis::all();
        return view('reproduksi.create', compact('jenis', ));
    }

    public function store(Request $request)
    {
        Reproduksi::create($request->all());
        return redirect()->route('reproduksi')->with('success', 'Data reproduksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $reproduksi = Reproduksi::find($id);
        $jenis = Jenis::all();
    
        if (!$reproduksi) {
            return redirect()->route('reproduksi.index')->with('error', 'Data tidak ditemukan');
        }
    
        return view('reproduksi.edit', compact('reproduksi', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $reproduksi = Reproduksi::findOrFail($id);
        $reproduksi->jenis_id = $request->jenis_id;
        $reproduksi->total_reproduksi = $request->total_reproduksi;
        $reproduksi->total_mati = $request->total_mati;
        $reproduksi->periode = $request->periode;
        $reproduksi->save();
        return redirect()->route('reproduksi')->with('success', 'Data reproduksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $reproduksis = Reproduksi::findOrFail($id);
        // Delete the user
        $reproduksis->delete();
        // Redirect with success message
        return redirect()->route('reproduksi')->with('success', 'reproduksi berhasil dihapus.');
    }
    
}
