<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('layouts.app', compact('barangs'));
    }

    // public function store(Request $request)
    // {
    //     Barang::create($request->only([
    //         'nama_barang','jumlah_barang','kategori_barang','harga_barang'
    //     ]));
    //     return back();
    // }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|',
            'jumlah_barang' => 'required|integer',
            'kategori_barang' => 'required|string',
            'harga_barang' => 'required|numeric',
        ]);

        Barang::create($validatedData);
        return back();
    }

    // public function update(Request $request, $id)
    // {
    //     Barang::where('id', $id)->update($request->only([
    //         'nama_barang','jumlah_barang','kategori_barang','harga_barang'
    //     ]));
    //     return back();
    // }
    public function update(Request $request, Barang $barang)
    {
        $barang->update($request->only([
            'nama_barang',
            'jumlah_barang',
            'kategori_barang',
            'harga_barang'
        ]));
        return back();
    }

    // public function destroy($id)
    // {
    //     Barang::destroy($id);
    //     return back();
    // }
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return back();
    }
}
