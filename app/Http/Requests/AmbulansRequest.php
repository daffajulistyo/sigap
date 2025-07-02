<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmbulansRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $ambulanId = $this->route('ambulan') ? $this->route('ambulan')->id : null;

        return [
            'puskesmas_id' => 'required|exists:puskesmas,id',
            'nomor_polisi' => 'required|string|max:10|unique:ambulans,nomor_polisi,'.$ambulanId,
            'merk' => 'required|string|max:50',
            'tahun' => 'required|integer|min:2000|max:'.(date('Y')+1),
            'nomor_mesin' => 'nullable|string|max:50',
            'nomor_rangka' => 'nullable|string|max:50',
            'status' => 'required|in:standby,dinas',
            'km_terakhir' => 'required|integer|min:0',
            'keterangan' => 'nullable|string'
        ];
    }
}
