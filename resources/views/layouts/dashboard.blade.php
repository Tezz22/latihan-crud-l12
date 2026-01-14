@extends('layouts.app')
@section('title', 'Dashboard')

@section('header')
<header class="relative bg-gray-800 after:absolute after:inset-0 after:border-y after:border-white/10">
    <div class="mx-auto max-w-7xl px-4 py-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <p class="mt-1 text-sm text-gray-400">Ringkasan data gudang</p>
    </div>
</header>
@endsection

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6">

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

        {{-- CARD BARANG --}}
        <div class="rounded-xl bg-gray-800 p-6 shadow outline outline-1 -outline-offset-1 outline-white/10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400">Jumlah Barang</p>
                    <p class="mt-2 text-3xl font-bold">{{ $totalBarang }}</p>
                </div>
                <div class="rounded-full bg-indigo-600/20 p-3 text-indigo-400">
                    📦
                </div>
            </div>

            <a href="{{ route('barangs.index') }}"
               class="mt-4 inline-block text-sm text-indigo-400 hover:text-indigo-300">
                Lihat Barang →
            </a>
        </div>

        {{-- CARD SUPPLIER --}}
        <div class="rounded-xl bg-gray-800 p-6 shadow outline outline-1 -outline-offset-1 outline-white/10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400">Jumlah Supplier</p>
                    <p class="mt-2 text-3xl font-bold">{{ $totalSupplier }}</p>
                </div>
                <div class="rounded-full bg-emerald-600/20 p-3 text-emerald-400">
                    🏭
                </div>
            </div>

            <a href="{{ route('suppliers.index') }}"
               class="mt-4 inline-block text-sm text-emerald-400 hover:text-emerald-300">
                Lihat Supplier →
            </a>
        </div>

        {{-- CARD TRANSAKSI --}}
        <div class="rounded-xl bg-gray-800 p-6 shadow outline outline-1 -outline-offset-1 outline-white/10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400">Jumlah Transaksi</p>
                    <p class="mt-2 text-3xl font-bold">{{ $totalTransaksi }}</p>
                </div>
                <div class="rounded-full bg-amber-600/20 p-3 text-amber-400">
                    🔄
                </div>
            </div>

            <a href="{{ route('transaksis.index') }}"
               class="mt-4 inline-block text-sm text-amber-400 hover:text-amber-300">
                Lihat Transaksi →
            </a>
        </div>

    </div>

</div>
@endsection
