<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'supplier_id'   => 'required|exists:suppliers,id',
            'nama_barang'   => 'required|string|max:255',
            'jumlah_barang' => 'required|integer|min:1',
            'kategori_barang' => 'required|string|max:255',
            'harga_barang'  => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'supplier_id.required' => 'Supplier wajib dipilih',
            'supplier_id.exists'   => 'Supplier tidak valid',
            'nama_barang.required' => 'Nama barang wajib diisi',
            'jumlah_barang.required' => 'Jumlah barang wajib diisi',
            'harga_barang.required' => 'Harga barang wajib diisi',
        ];
    }
}
