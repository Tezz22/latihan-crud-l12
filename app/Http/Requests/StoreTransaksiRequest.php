<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaksiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'barang_id'   => 'required|exists:barangs,id',
            'jenis'       => 'required|in:masuk,keluar',
            'qty'         => 'required|integer|min:1',
            'tanggal'     => 'required|date',
            'keterangan'  => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'barang_id.required' => 'Barang wajib dipilih',
            'jenis.required'     => 'Jenis wajib dipilih',
            'qty.required'       => 'Qty wajib diisi',
            'tanggal.required'   => 'Tanggal wajib diisi',
        ];
    }
}
