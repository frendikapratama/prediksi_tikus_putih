<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;

class JenisController extends Controller
{
    public function index()
    {
        $Jenis = Jenis::all();
        return view('Jenis.index', compact('Jenis'));
    }

    public function create()
    {
        return view('Jenis.create');
    }

    public function store(Request $request)
    {
        Jenis::create($request->all());
        return redirect()->route('Jenis.index');
    }

    public function edit($id)
    {
        $kategoriSize = Jenis::find($id);
        return view('Jenis.edit', compact('kategoriSize'));
    }

    public function update(Request $request, $id)
    {
        $kategoriSize = Jenis::find($id);
        $kategoriSize->update($request->all());
        return redirect()->route('Jenis.index');
    }

    public function destroy($id)
    {
        Jenis::find($id)->delete();
        return redirect()->route('Jenis.index');
    }
}
