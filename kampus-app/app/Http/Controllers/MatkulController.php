<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    // Fitur SEARCH ada di sini
    public function index(Request $request)
    {
        $cari = $request->get('search');
        $matkul = Matkul::where('nama', 'LIKE', "%$cari%")
                        ->orWhere('kode', 'LIKE', "%$cari%")
                        ->get();
        
        return view('matkul.index', compact('matkul'));
    }

    public function create() { return view('matkul.create'); }

    public function store(Request $request)
    {
        Matkul::create($request->all());
        return redirect('/matkul');
    }

    // Fitur DELETE
    public function destroy($id)
    {
        $data = Matkul::findOrFail($id);
        $data->delete();
        return redirect('/matkul');
    }

    // Fitur UPDATE (Tahap 1: Munculin Form Edit)
    public function edit($id)
    {
        $matkul = Matkul::findOrFail($id);
        return view('matkul.edit', compact('matkul'));
    }

    // Fitur UPDATE (Tahap 2: Simpan Perubahan)
    public function update(Request $request, $id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->update($request->all());
        return redirect('/matkul');
    }
}