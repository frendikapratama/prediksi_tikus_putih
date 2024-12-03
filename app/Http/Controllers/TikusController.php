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
        $dataTikus = Tikus::with('jenis', 'kategoriSize')->get();
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
        $request->merge([
            'created_at' => Carbon::now()->startOfMonth(), // Menetapkan awal bulan ini sebagai created_at
        ]);
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
        $tikus->created_at = Carbon::createFromFormat('Y-m', $request->created_at)->startOfMonth();
        $tikus->save();
        return redirect()->route('tikus.index');
    }

    public function destroy($id)
    {
        Tikus::find($id)->delete();
        return redirect()->route('tikus.index');
    }
}
