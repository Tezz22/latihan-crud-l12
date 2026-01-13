@extends('layouts.app')
@section('title', 'Edit Barang')

@section('content')
<div class="mx-auto max-w-2xl px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Edit Barang</h1>

    <form action="{{ route('barangs.update', $barang) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">
                Supplier
            </label>
            <select name="supplier_id" class="w-full rounded bg-gray-900 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                <option value="">Pilih Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $barang->supplier_id) == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->nama_supplier }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- NAMA BARANG --}}
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">
                Nama Barang
            </label>
            <input
                type="text"
                name="nama_barang"
                value="{{ old('nama_barang', $barang->nama_barang) }}"
                placeholder="Contoh: Laptop"
                class="w-full rounded bg-gray-900 px-3 py-2
                    focus:outline-none focus:ring-2 focus:ring-yellow-500
                    @error('nama_barang') border border-red-500 @enderror">

            @error('nama_barang')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- JUMLAH --}}
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">
                Jumlah
            </label>
            <input
                type="number"
                name="jumlah_barang"
                value="{{ old('jumlah_barang', $barang->jumlah_barang) }}"
                placeholder="Contoh: 10"
                class="w-full rounded bg-gray-900 px-3 py-2
                    focus:outline-none focus:ring-2 focus:ring-yellow-500
                    @error('jumlah_barang') border border-red-500 @enderror">

            @error('jumlah_barang')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- KATEGORI --}}
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">
                Kategori
            </label>
            <input
                type="text"
                name="kategori_barang"
                value="{{ old('kategori_barang', $barang->kategori_barang) }}"
                placeholder="Contoh: Elektronik"
                class="w-full rounded bg-gray-900 px-3 py-2
                    focus:outline-none focus:ring-2 focus:ring-yellow-500
                    @error('kategori_barang') border border-red-500 @enderror">

            @error('kategori_barang')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- HARGA --}}
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">
                Harga
            </label>
            <input
                type="number"
                name="harga_barang"
                value="{{ old('harga_barang', $barang->harga_barang) }}"
                placeholder="Contoh: 1500000"
                class="w-full rounded bg-gray-900 px-3 py-2
                    focus:outline-none focus:ring-2 focus:ring-yellow-500
                    @error('harga_barang') border border-red-500 @enderror">

            @error('harga_barang')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- BUTTONS --}}
        <div class="pt-4 flex items-center gap-3">
            <a href="{{ route('barangs.index') }}"
                class="rounded bg-gray-600 px-5 py-2 text-sm font-semibold hover:bg-gray-700">
                Kembali
            </a>

            <button type="submit"
                class="rounded bg-yellow-500 px-5 py-2 text-sm font-semibold hover:bg-yellow-600">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
