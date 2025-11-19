<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TarikModul;

class TarikModulController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type'); // contoh: data-nama,istirahat

        $query = TarikModul::latest();

        if ($type) {
            // Ubah string jadi array
            $types = explode(',', $type);

            // Cari semua type dalam array
            $query->whereIn('type_template', $types);
        }

        $data = $query->get();

        return view('admin.tambah-modul', compact('data', 'type'));
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
