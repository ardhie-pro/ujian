<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TarikModul;

class TarikModulController extends Controller
{
    public function index()
    {
        $data = TarikModul::latest()->get();
        return view('admin.tambah-modul', compact('data'));
    }

    public function store(Request $request)
    {
        TarikModul::create([
            'modul' => $request->modul,
            'type_template' => $request->type_template,
            'waktu' => $request->waktu,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $item = TarikModul::findOrFail($id);
        $item->update([
            'modul' => $request->modul,
            'type_template' => $request->type_template,
            'waktu' => $request->waktu,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        TarikModul::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
