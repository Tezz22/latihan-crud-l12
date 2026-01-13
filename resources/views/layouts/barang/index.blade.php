@extends('layouts.app')

@section('title', 'Dashboard Barang')

@section('header')
<header class="relative bg-gray-800 after:absolute after:inset-0 after:border-y after:border-white/10">
    <div class="mx-auto max-w-7xl px-4 py-6">
        <h1 class="text-3xl font-bold">Dashboard Barang</h1>
    </div>
</header>
@endsection

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6">

    {{-- BUTTON CREATE --}}
    <button
        onclick="openCreate()"
        class="mb-4 rounded bg-indigo-600 px-4 py-2 text-sm font-semibold hover:bg-indigo-700">
        + Tambah Barang
    </button>

    {{-- TABLE --}}
    <div class="overflow-hidden rounded-lg border border-white/10">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left">Supplier</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-center">Jumlah</th>
                    <th class="px-4 py-3 text-center">Kategori</th>
                    <th class="px-4 py-3 text-center">Harga</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10 bg-gray-900">
                @foreach ($barangs as $barang)
                <tr>
                    <td class="px-4 py-2">{{ $barang->supplier->nama_supplier }}</td>
                    <td class="px-4 py-2">{{ $barang->nama_barang }}</td>
                    <td class="px-4 py-2 text-center">{{ $barang->jumlah_barang }}</td>
                    <td class="px-4 py-2 text-center">{{ $barang->kategori_barang }}</td>
                    <td class="px-4 py-2 text-center">{{ $barang->harga_barang }}</td>

                    <td class="px-4 py-2 flex justify-center gap-2">

                        {{-- EDIT --}}
                        <button
                            data-id="{{ $barang->id }}"
                            data-supplier="{{ $barang->supplier_id }}"
                            data-nama="{{ $barang->nama_barang }}"
                            data-jumlah="{{ $barang->jumlah_barang }}"
                            data-kategori="{{ $barang->kategori_barang }}"
                            data-harga="{{ $barang->harga_barang }}"
                            onclick="openEdit(this)"
                            class="rounded bg-yellow-500 px-3 py-1 text-xs hover:bg-yellow-600">
                            Edit
                        </button>

                        {{-- DELETE --}}
                        <button type="button"
                                onclick="openConfirmDelete('{{ route('barangs.destroy', $barang) }}')"
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
<div id="modalCreate"
    class="fixed inset-0 bg-black/60 flex items-center justify-center {{ $errors->getBag('create')->any() ? '' : 'hidden' }}">
    <div class="w-full max-w-md rounded-lg bg-gray-800 p-6">
        <h2 class="mb-4 text-lg font-bold">Tambah Barang</h2>

        <form action="{{ route('barangs.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Supplier</label>

                <select
                    name="supplier_id"
                    required
                    class="w-full rounded bg-gray-900 px-3 py-2
                    @error('supplier_id','create') border border-red-500 @enderror">

                    <option value="">Pilih Supplier</option>

                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}"
                            {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->nama_supplier }}
                        </option>
                    @endforeach
                </select>

                @error('supplier_id','create')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Nama Barang</label>
                <input
                    type="text"
                    name="nama_barang"
                    value="{{ old('nama_barang') }}"
                    placeholder="Nama Barang"
                    required
                    class="w-full rounded bg-gray-900 px-3 py-2
                    @error('nama_barang','create') border border-red-500 @enderror">
                @error('nama_barang','create')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Jumlah</label>
                <input
                    type="number"
                    name="jumlah_barang"
                    value="{{ old('jumlah_barang') }}"
                    placeholder="Jumlah"
                    required
                    min="1"
                    step="1"
                    class="w-full rounded bg-gray-900 px-3 py-2
                    @error('jumlah_barang','create') border border-red-500 @enderror">
                @error('jumlah_barang','create')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Kategori</label>
                <input
                    type="text"
                    name="kategori_barang"
                    value="{{ old('kategori_barang') }}"
                    placeholder="Kategori"
                    required
                    class="w-full rounded bg-gray-900 px-3 py-2
                    @error('kategori_barang','create') border border-red-500 @enderror">
                @error('kategori_barang','create')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Harga</label>
                <input
                    type="number"
                    name="harga_barang"
                    value="{{ old('harga_barang') }}"
                    placeholder="Harga"
                    required
                    min="0"
                    step="0.01"
                    class="w-full rounded bg-gray-900 px-3 py-2
                    @error('harga_barang','create') border border-red-500 @enderror">
                @error('harga_barang','create')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-2 pt-3">
                <button type="button" onclick="closeCreate()"
                        class="rounded bg-gray-600 px-4 py-2 text-sm">Batal</button>
                <button type="submit"
                        class="rounded bg-indigo-600 px-4 py-2 text-sm">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL EDIT --}}
<div id="modalEdit"
    class="fixed inset-0 hidden bg-black/60 flex items-center justify-center">
    <div class="w-full max-w-md rounded-lg bg-gray-800 p-6">
        <h2 class="mb-4 text-lg font-bold">Edit Barang</h2>

        <form id="formEdit" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Supplier</label>

                <select
                    id="e_supplier"
                    name="supplier_id"
                    required
                    class="w-full rounded bg-gray-900 px-3 py-2">
                    <option value="">Pilih Supplier</option>

                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">
                            {{ $supplier->nama_supplier }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Nama Barang</label>
                <input id="e_nama" type="text" name="nama_barang" placeholder="Nama Barang"
                    required
                    class="w-full rounded bg-gray-900 px-3 py-2">
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Jumlah</label>
                <input id="e_jumlah" type="number" name="jumlah_barang" placeholder="Jumlah"
                    required min="1" step="1"
                    class="w-full rounded bg-gray-900 px-3 py-2">
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Kategori</label>
                <input id="e_kategori" type="text" name="kategori_barang" placeholder="Kategori"
                    required
                    class="w-full rounded bg-gray-900 px-3 py-2">
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Harga</label>
                <input id="e_harga" type="number" name="harga_barang" placeholder="Harga"
                    required min="0" step="0.01"
                    class="w-full rounded bg-gray-900 px-3 py-2">
            </div>

            <div class="flex justify-end gap-2 pt-3">
                <button type="button" onclick="closeEdit()"
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
    function openCreate() {
        document.getElementById('modalCreate').classList.remove('hidden');
    }
    function closeCreate() {
        document.getElementById('modalCreate').classList.add('hidden');
    }

    function openEdit(button) {
        const id       = button.dataset.id;
        const nama     = button.dataset.nama;
        const jumlah   = button.dataset.jumlah;
        const kategori = button.dataset.kategori;
        const harga    = button.dataset.harga;
        const supplier = button.dataset.supplier;

        document.getElementById('modalEdit').classList.remove('hidden');
        document.getElementById('formEdit').action = `/barangs/${id}`;

        document.getElementById('e_supplier').value = supplier; // <<< ini penting
        document.getElementById('e_nama').value     = nama;
        document.getElementById('e_jumlah').value   = jumlah;
        document.getElementById('e_kategori').value = kategori;
        document.getElementById('e_harga').value    = harga;
    }

    function closeEdit() {
        document.getElementById('modalEdit').classList.add('hidden');
    }
</script>
@endpush
