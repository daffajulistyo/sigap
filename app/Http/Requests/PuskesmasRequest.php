<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class PuskesmasRequest extends FormRequest
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
    public function rules()
    {
        $puskesmasId = $this->route('puskesma');

        return [
            'kode_puskesmas' => [
                'required',
                'string',
                'max:10',
                Rule::unique('puskesmas')->whereNull('deleted_at')->ignore($puskesmasId)
            ],
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kecamatan' => 'required|string|max:100',
            'desa' => 'required|string|max:100',
            'nomor_telepon' => 'required|string|max:15|min:10',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180'
        ];
    }


    public function messages()
    {
        return [
            'kode_puskesmas.required' => 'Kode puskesmas wajib diisi',
            'kode_puskesmas.unique' => 'Kode puskesmas sudah digunakan',
            'nama.required' => 'Nama puskesmas wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'kecamatan.required' => 'Kecamatan wajib diisi',
            'desa.required' => 'Desa/Kelurahan wajib diisi',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi',
            'nomor_telepon.min' => 'Nomor telepon minimal 10 karakter',
            'nomor_telepon.max' => 'Nomor telepon maksimal 15 karakter',
            'latitude.required' => 'Latitude wajib diisi',
            'latitude.between' => 'Latitude harus antara -90 sampai 90',
            'longitude.required' => 'Longitude wajib diisi',
            'longitude.between' => 'Longitude harus antara -180 sampai 180'
        ];
    }
}
