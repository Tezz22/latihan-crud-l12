@extends('layouts.app')
@section('title', 'Hapus Transaksi')

@section('content')
<div class="mx-auto max-w-xl px-4 py-6">
    <h1 class="text-2xl font-bold mb-4 text-red-400">Hapus Transaksi</h1>

    <p class="mb-6">
        Yakin mau menghapus transaksi untuk barang:
        <strong>{{ $transaksi->barang->nama_barang ?? '-' }}</strong>?
    </p>

    <div class="rounded-lg border border-white/10 bg-gray-800 p-4 mb-6 text-sm">
        <div><span class="text-gray-400">Jenis:</span> {{ strtoupper($transaksi->jenis) }}</div>
        <div><span class="text-gray-400">Qty:</span> {{ $transaksi->qty }}</div>
        <div><span class="text-gray-400">Tanggal:</span> {{ $transaksi->tanggal }}</div>
        <div><span class="text-gray-400">Keterangan:</span> {{ $transaksi->keterangan ?? '-' }}</div>
    </div>

    <form action="{{ route('transaksis.destroy', $transaksi) }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="flex gap-3">
            <a href="{{ route('transaksis.index') }}"
               class="rounded bg-gray-600 px-5 py-2 text-sm font-semibold hover:bg-gray-700">
                Batal
            </a>

            <button type="submit"
                class="rounded bg-red-600 px-5 py-2 text-sm font-semibold hover:bg-red-700">
                Hapus
            </button>
        </div>
    </form>
</div>
@endsection
