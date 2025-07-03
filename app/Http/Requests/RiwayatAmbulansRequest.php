<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RiwayatAmbulansRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'ambulans_id' => 'required|exists:ambulans,id',
            'tujuan' => 'required|string|max:255',
            'keperluan' => 'required|string',
            'waktu_berangkat' => 'required|date',
            'km_berangkat' => 'required|integer|min:0',
            'status_perjalanan' => 'required|in:berjalan,selesai,batal',
            'catatan' => 'nullable|string'
        ];

        // Validasi khusus untuk update
        if ($this->method() === 'PUT') {
            $rules['waktu_kembali'] = 'nullable|date|after_or_equal:waktu_berangkat';
            $rules['km_kembali'] = 'nullable|integer|min:km_berangkat';
        }

        return $rules;
    }
}
