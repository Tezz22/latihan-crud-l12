@extends('layouts.app')

@section('title', 'Dashboard Supplier')

@section('header')
<header class="relative bg-gray-800 after:absolute after:inset-0 after:border-y after:border-white/10">
    <div class="mx-auto max-w-7xl px-4 py-6">
        <h1 class="text-3xl font-bold">Dashboard Supplier</h1>
    </div>
</header>
@endsection

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6">

    <button onclick="openCreateSupplier()"
        class="mb-4 rounded bg-indigo-600 px-4 py-2 text-sm font-semibold hover:bg-indigo-700">
        + Tambah Supplier
    </button>

    <div class="overflow-hidden rounded-lg border border-white/10">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left">Nama Supplier</th>
                    <th class="px-4 py-3 text-center">No. Telp</th>
                    <th class="px-4 py-3 text-center">Alamat</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-white/10 bg-gray-900">
                @foreach ($suppliers as $s)
                <tr>
                    <td class="px-4 py-2">{{ $s->nama_supplier }}</td>
                    <td class="px-4 py-2 text-center">{{ $s->no_telp ?? '-' }}</td>
                    <td class="px-4 py-2 text-center">{{ $s->alamat ?? '-' }}</td>

                    <td class="px-4 py-2 flex justify-center gap-2">
                        <button
                            data-id="{{ $s->id }}"
                            data-nama="{{ $s->nama_supplier }}"
                            data-telp="{{ $s->no_telp ?? '' }}"
                            data-alamat="{{ $s->alamat ?? '' }}"
                            onclick="openEditSupplier(this)"
                            class="rounded bg-yellow-500 px-3 py-1 text-xs hover:bg-yellow-600">
                            Edit
                        </button>

                        <button type="button"
                                onclick="openConfirmDelete('{{ route('suppliers.destroy', $s) }}')"
                                class="rounded bg-red-600 px-3 py-1 text-xs hover:bg-red-700">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

{{-- MODAL CREATE --}}
<div id="modalCreateSupplier"
     class="fixed inset-0 bg-black/60 flex items-center justify-center {{ $errors->any() ? '' : 'hidden' }}">
    <div class="w-full max-w-md rounded-lg bg-gray-800 p-6">
        <h2 class="mb-4 text-lg font-bold">Tambah Supplier</h2>

        <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Nama Supplier</label>
                <input type="text" name="nama_supplier" value="{{ old('nama_supplier') }}" required
                    class="w-full rounded bg-gray-900 px-3 py-2 @error('nama_supplier') border border-red-500 @enderror">
                @error('nama_supplier')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">No. Telp</label>
                <input type="text" name="no_telp" value="{{ old('no_telp') }}"
                    class="w-full rounded bg-gray-900 px-3 py-2">
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat') }}"
                    class="w-full rounded bg-gray-900 px-3 py-2">
            </div>

            <div class="flex justify-end gap-2 pt-3">
                <button type="button" onclick="closeCreateSupplier()"
                    class="rounded bg-gray-600 px-4 py-2 text-sm">Batal</button>
                <button type="submit"
                    class="rounded bg-indigo-600 px-4 py-2 text-sm">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL EDIT --}}
<div id="modalEditSupplier" class="fixed inset-0 hidden bg-black/60 flex items-center justify-center">
    <div class="w-full max-w-md rounded-lg bg-gray-800 p-6">
        <h2 class="mb-4 text-lg font-bold">Edit Supplier</h2>

        <form id="formEditSupplier" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Nama Supplier</label>
                <input id="e_nama_supplier" type="text" name="nama_supplier" required
                    class="w-full rounded bg-gray-900 px-3 py-2">
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">No. Telp</label>
                <input id="e_no_telp" type="text" name="no_telp"
                    class="w-full rounded bg-gray-900 px-3 py-2">
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Alamat</label>
                <input id="e_alamat" type="text" name="alamat"
                    class="w-full rounded bg-gray-900 px-3 py-2">
            </div>

            <div class="flex justify-end gap-2 pt-3">
                <button type="button" onclick="closeEditSupplier()"
                    class="rounded bg-gray-600 px-4 py-2 text-sm">Batal</button>
                <button type="submit"
                    class="rounded bg-yellow-500 px-4 py-2 text-sm">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openCreateSupplier() {
        document.getElementById('modalCreateSupplier').classList.remove('hidden');
    }
    function closeCreateSupplier() {
        document.getElementById('modalCreateSupplier').classList.add('hidden');
    }

    function openEditSupplier(btn) {
        const id = btn.dataset.id;
        document.getElementById('modalEditSupplier').classList.remove('hidden');
        document.getElementById('formEditSupplier').action = `/suppliers/${id}`;

        document.getElementById('e_nama_supplier').value = btn.dataset.nama || '';
        document.getElementById('e_no_telp').value = btn.dataset.telp || '';
        document.getElementById('e_alamat').value = btn.dataset.alamat || '';
    }
    function closeEditSupplier() {
        document.getElementById('modalEditSupplier').classList.add('hidden');
    }
</script>
@endpush
