<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiRequest;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('barang')->latest()->get();
        $barangs = Barang::orderBy('nama_barang')->get();

        return view('layouts.transaksi.index', compact('transaksis', 'barangs'));
    }

    public function store(StoreTransaksiRequest $request)
    {
        Transaksi::create($request->validated());

        return back()->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return back()->with('success', 'Transaksi berhasil dihapus');
    }
}
