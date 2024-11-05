<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        return view('jenis.index', compact('jenis'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        Jenis::create($request->all());
        return redirect()->route('jenis.index');
    }

    public function edit($id)
    {
        $jenis = Jenis::find($id);
        return view('jenis.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $jenis = Jenis::find($id);
        $jenis->update($request->all());
        return redirect()->route('jenis.index');
    }

    public function destroy($id)
    {
        Jenis::find($id)->delete();
        return redirect()->route('jenis.index');
    }
}
