@extends('layouts.app')
@section('title', 'Hapus Barang')

@section('content')
<div class="mx-auto max-w-2xl px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Hapus Barang</h1>

    <p class="mb-4">Yakin mau hapus barang ini?</p>

    <form action="{{ route('barangs.destroy', $barang) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="rounded bg-red-600 px-4 py-2 text-sm">Hapus</button>
    </form>
</div>
@endsection
