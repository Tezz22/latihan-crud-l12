@extends('layouts.app')
@section('title', 'Transaksi Barang')

@section('header')
<header class="relative bg-gray-800 after:absolute after:inset-0 after:border-y after:border-white/10">
    <div class="mx-auto max-w-7xl px-4 py-6">
        <h1 class="text-3xl font-bold">Transaksi Barang</h1>
    </div>
</header>
@endsection

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6">

    {{-- BUTTON CREATE (PAKAI MODAL) --}}
    <button
        type="button"
        onclick="openCreate()"
        class="mb-4 inline-block rounded bg-indigo-600 px-4 py-2 text-sm font-semibold hover:bg-indigo-700">
        + Tambah Transaksi
    </button>

    {{-- TABLE --}}
    <div class="overflow-hidden rounded-lg border border-white/10">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left">Barang</th>
                    <th class="px-4 py-3 text-center">Jenis</th>
                    <th class="px-4 py-3 text-center">Qty</th>
                    <th class="px-4 py-3 text-center">Tanggal</th>
                    <th class="px-4 py-3 text-left">Keterangan</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-white/10 bg-gray-900">
                @foreach($transaksis as $t)
                <tr>
                    <td class="px-4 py-2">{{ $t->barang->nama_barang ?? '-' }}</td>

                    <td class="px-4 py-2 text-center">
                        <span class="rounded px-2 py-1 text-xs {{ $t->jenis === 'masuk' ? 'bg-green-600/30 text-green-200' : 'bg-red-600/30 text-red-200' }}">
                            {{ strtoupper($t->jenis) }}
                        </span>
                    </td>

                    <td class="px-4 py-2 text-center">{{ $t->qty }}</td>
                    <td class="px-4 py-2 text-center">{{ $t->tanggal }}</td>
                    <td class="px-4 py-2">{{ $t->keterangan ?? '-' }}</td>

                    <td class="px-4 py-2 flex justify-center gap-2">
                        {{-- DELETE --}}
                        <button type="button"
                                onclick="openConfirmDelete('{{ route('transaksis.destroy', $t) }}')"
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

{{-- ===================== MODAL CREATE ===================== --}}
<div id="modalCreate"
     class="fixed inset-0 bg-black/60 flex items-center justify-center {{ $errors->getBag('create')->any() ? '' : 'hidden' }}">
    <div class="w-full max-w-md rounded-lg bg-gray-800 p-6">
        <h2 class="mb-4 text-lg font-bold">Tambah Transaksi</h2>

        <form action="{{ route('transaksis.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- BARANG --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Barang</label>
                <select name="barang_id" required
                        class="w-full rounded bg-gray-900 px-3 py-2
                        @error('barang_id','create') border border-red-500 @enderror">
                    <option value="">Pilih Barang</option>
                    @foreach($barangs as $b)
                        <option value="{{ $b->id }}" {{ old('barang_id') == $b->id ? 'selected' : '' }}>
                            {{ $b->nama_barang }}
                        </option>
                    @endforeach
                </select>
                @error('barang_id','create')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- JENIS --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Jenis</label>
                <select name="jenis" required
                        class="w-full rounded bg-gray-900 px-3 py-2
                        @error('jenis','create') border border-red-500 @enderror">
                    <option value="">Pilih Jenis</option>
                    <option value="masuk"  {{ old('jenis')=='masuk' ? 'selected' : '' }}>Masuk</option>
                    <option value="keluar" {{ old('jenis')=='keluar' ? 'selected' : '' }}>Keluar</option>
                </select>
                @error('jenis','create')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- QTY --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Qty</label>
                <input type="number" name="qty" min="1" step="1" required
                       value="{{ old('qty') }}"
                       class="w-full rounded bg-gray-900 px-3 py-2
                       @error('qty','create') border border-red-500 @enderror">
                @error('qty','create')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- TANGGAL --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Tanggal</label>
                <input type="date" name="tanggal" required
                       value="{{ old('tanggal') }}"
                       class="w-full rounded bg-gray-900 px-3 py-2
                       @error('tanggal','create') border border-red-500 @enderror">
                @error('tanggal','create')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- KETERANGAN --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-300">Keterangan (opsional)</label>
                <input type="text" name="keterangan"
                       value="{{ old('keterangan') }}"
                       class="w-full rounded bg-gray-900 px-3 py-2">
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

@endsection

@push('scripts')
<script>
    function openCreate() {
        document.getElementById('modalCreate').classList.remove('hidden');
    }
    function closeCreate() {
        document.getElementById('modalCreate').classList.add('hidden');
    }
</script>
@endpush
