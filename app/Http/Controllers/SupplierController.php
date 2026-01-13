<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('layouts.supplier.index', compact('suppliers'));
    }

    public function store(StoreSupplierRequest $request)
    {
        Supplier::create($request->validated());
        return back()->with('success', 'Supplier berhasil ditambahkan');
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->validated());
        return back()->with('success', 'Supplier berhasil diperbarui');
    }

    public function destroy(Supplier $supplier)
    {
        // Kalau kamu pakai FK barangs.supplier_id dengan cascadeOnDelete,
        // delete supplier akan ngapus barang terkait juga.
        // Kalau kamu gak mau itu, bilang, nanti gue bikinin proteksi.
        $supplier->delete();

        return back()->with('success', 'Supplier berhasil dihapus');
    }
}
