<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSize;
class KategoriSizeController extends Controller
{
    public function index()
    {
        $kategoriSizes = KategoriSize::all();
        return view('kategori.index', compact('kategoriSizes'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        KategoriSize::create($request->all());
        return redirect()->route('kategori.index');
    }

    public function edit($id)
    {
        $kategoriSize = KategoriSize::find($id);
        return view('kategori.edit', compact('kategoriSize'));
    }

    public function update(Request $request, $id)
    {
        $kategoriSize = KategoriSize::find($id);
        $kategoriSize->update($request->all());
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        KategoriSize::find($id)->delete();
        return redirect()->route('kategori.index');
    }
}
