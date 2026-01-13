@extends('layouts.app')
@section('title', 'Edit Supplier')

@section('content')
<div class="mx-auto max-w-2xl px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Edit Supplier</h1>

    <form action="{{ route('suppliers.update', $supplier) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">
                Nama Supplier
            </label>
            <input
                type="text"
                name="nama_supplier"
                value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                required
                class="w-full rounded bg-gray-900 px-3 py-2
                @error('nama_supplier') border border-red-500 @enderror">

            @error('nama_supplier')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">
                No. Telp
            </label>
            <input
                type="text"
                name="no_telp"
                value="{{ old('no_telp', $supplier->no_telp) }}"
                class="w-full rounded bg-gray-900 px-3 py-2">
        </div>

        <div>
            <label class="mb-1 block text-sm font-medium text-gray-300">
                Alamat
            </label>
            <input
                type="text"
                name="alamat"
                value="{{ old('alamat', $supplier->alamat) }}"
                class="w-full rounded bg-gray-900 px-3 py-2">
        </div>

        <div class="pt-4 flex gap-3">
            <a href="{{ route('suppliers.index') }}"
               class="rounded bg-gray-600 px-5 py-2 text-sm font-semibold hover:bg-gray-700">
                Kembali
            </a>

            <button
                type="subm
