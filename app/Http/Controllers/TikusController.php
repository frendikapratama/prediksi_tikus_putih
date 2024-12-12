<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tikus;
use App\Models\KategoriSize;
use App\Models\Jenis;
use Carbon\Carbon;

class TikusController extends Controller
{

    public function index()
    {
        Carbon::setLocale('id');
    
        // Ambil data paginasi dan modifikasi langsung dengan transform()
        $dataTikus = Tikus::with('jenis', 'kategoriSize')
            ->orderBy('periode', 'desc')
            ->paginate(10);
    
        // Transform data langsung dalam koleksi
        $dataTikus->getCollection()->transform(function ($item) {
            $item->periode = Carbon::createFromFormat('Y-m', $item->periode)->translatedFormat('F Y');
            return $item;
        });
    
        return view('tikus.index', compact('dataTikus'));
    }
    

    public function create()
    {
        $jenis = Jenis::all();
        $kategoriSize = KategoriSize::all();
        return view('tikus.create', compact('jenis', 'kategoriSize'));
    }

    public function store(Request $request)
    {
        Tikus::create($request->all());
        return redirect()->route('tikus.index');
    }

    public function edit($id)
    {
        $tikus = Tikus::find($id);
        $jenis = Jenis::all();
        $kategoriSize = KategoriSize::all();
        return view('tikus.edit', compact('tikus', 'jenis', 'kategoriSize'));
    }

    public function update(Request $request, $id)
    {
        $tikus = Tikus::findOrFail($id);
        $tikus->jenis_id = $request->jenis_id;
        $tikus->kategori_size_id = $request->kategori_size_id;
        $tikus->total_jantan = $request->total_jantan;
        $tikus->total_betina = $request->total_betina;
        $tikus->periode = $request->periode;
        $tikus->save();
        return redirect()->route('tikus.index');
    }

    public function destroy($id)
    {
        Tikus::find($id)->delete();
        return redirect()->route('tikus.index');
    }
}
