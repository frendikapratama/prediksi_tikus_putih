<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tikus;
use App\Models\KategoriSize;
use App\Models\Jenis;
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
        $tikus = Tikus::find($id);
        $tikus->update($request->all());
        return redirect()->route('tikus.index');
    }

    public function destroy($id)
    {
        Tikus::find($id)->delete();
        return redirect()->route('tikus.index');
    }
}
