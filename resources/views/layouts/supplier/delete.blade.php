@extends('layouts.app')
@section('title', 'Hapus Supplier')

@section('content')
<div class="mx-auto max-w-xl px-4 py-6">
    <h1 class="text-2xl font-bold mb-4 text-red-400">Hapus Supplier</h1>

    <p class="mb-6">
        Yakin mau menghapus supplier
        <strong>{{ $supplier->nama_supplier }}</strong>?
    </p>

    <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="flex gap-3">
            <a href="{{ route('suppliers.index') }}"
               class="rounded bg-gray-600 px-5 py-2 text-sm font-semibold hover:bg-gray-700">
                Batal
            </a>

            <button
                type="submit"
                class="rounded bg-red-600 px-5 py-2 text-sm font-semibold hover:bg-red-700">
                Hapus
            </button>
        </div>
    </form>
</div>
@endsection
