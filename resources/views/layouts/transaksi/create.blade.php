@extends('layouts.app')
@section('title', 'Tambah Transaksi')

@section('content')
<div class="mx-auto max-w-2xl px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Transaksi</h1>

    <form action="{{ route('transaksis.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">Barang</label>
            <select name="barang_id" required
                class="w-full rounded bg-gray-900 px-3 py-2 @error('barang_id') border border-red-500 @enderror">
                <option value="">Pilih Barang</option>
                @foreach($barangs as $b)
                    <option value="{{ $b->id }}" {{ old('barang_id') == $b->id ? 'selected' : '' }}>
                        {{ $b->nama_barang }}
                    </option>
                @endforeach
            </select>
            @error('barang_id') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">Jenis</label>
            <select name="jenis" required
                class="w-full rounded bg-gray-900 px-3 py-2 @error('jenis') border border-red-500 @enderror">
                <option value="">Pilih</option>
                <option value="masuk" {{ old('jenis')=='masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="keluar" {{ old('jenis')=='keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
            @error('jenis') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">Qty</label>
            <input type="number" name="qty" min="1" required value="{{ old('qty') }}"
                class="w-full rounded bg-gray-900 px-3 py-2 @error('qty') border border-red-500 @enderror">
            @error('qty') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">Tanggal</label>
            <input type="date" name="tanggal" required value="{{ old('tanggal') }}"
                class="w-full rounded bg-gray-900 px-3 py-2 @error('tanggal') border border-red-500 @enderror">
            @error('tanggal') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">Keterangan (opsional)</label>
            <input type="text" name="keterangan" value="{{ old('keterangan') }}"
                class="w-full rounded bg-gray-900 px-3 py-2">
        </div>

        <div class="pt-4 flex gap-3">
            <a href="{{ route('transaksis.index') }}"
               class="rounded bg-gray-600 px-5 py-2 text-sm font-semibold hover:bg-gray-700">
                Kembali
            </a>
            <button type="submit"
                class="rounded bg-indigo-600 px-5 py-2 text-sm font-semibold hover:bg-indigo-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
