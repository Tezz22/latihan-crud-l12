<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;
use App\Models\Supplier;

class BarangController extends Controller
{
    // public function index()
    // {
    //     $barangs = Barang::all();
    //     return view('layouts.barang.index', compact('barangs'));
    // }
    public function index()
    {
        $barangs = Barang::with('supplier')->get();
        $suppliers = Supplier::all();

        return view('layouts.barang.index', compact('barangs', 'suppliers'));
    }

    // public function store(Request $request)
    // {
    //     Barang::create($request->only([
    //         'nama_barang','jumlah_barang','kategori_barang','harga_barang'
    //     ]));
    //     return back();
    // }
    // public function store(Request $request)
    // {
    //     $validated = $request->validateWithBag('create', [
    //         'nama_barang'     => 'required|string|max:255',
    //         'jumlah_barang'   => 'required|integer|min:1',
    //         'kategori_barang' => 'required|string|max:255',
    //         'harga_barang'    => 'required|numeric|min:0',
    //     ], [
    //         'nama_barang.required'     => 'Nama barang wajib diisi',
    //         'jumlah_barang.required'   => 'Jumlah wajib diisi',
    //         'jumlah_barang.integer'    => 'Jumlah harus angka',
    //         'kategori_barang.required' => 'Kategori wajib diisi',
    //         'harga_barang.required'    => 'Harga wajib diisi',
    //         'harga_barang.numeric'     => 'Harga harus angka',
    //     ]);

    //     Barang::create($validated);

    //     return back()->with('success', 'Barang berhasil ditambahkan');
    // }
    public function store(StoreBarangRequest $request)
    {
        Barang::create($request->validated());

        return back()->with('success', 'Barang berhasil ditambahkan');
    }


    // public function update(Request $request, $id)
    // {
    //     Barang::where('id', $id)->update($request->only([
    //         'nama_barang','jumlah_barang','kategori_barang','harga_barang'
    //     ]));
    //     return back();
    // }
    // public function update(Request $request, Barang $barang)
    // {
    //     $validated = $request->validateWithBag('update', [
    //         'nama_barang'     => 'required|string|max:255',
    //         'jumlah_barang'   => 'required|integer|min:1',
    //         'kategori_barang' => 'required|string|max:255',
    //         'harga_barang'    => 'required|numeric|min:0',
    //     ]);

    //     $barang->update($validated);

    //     return back()->with('success', 'Barang berhasil diperbarui');
    // }
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $barang->update($request->validated());

        return back()->with('success', 'Barang berhasil diperbarui');
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
