<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tenSach' => 'required|min:4|max:255',
            'tacGia' => 'required|min:4|max:255',
            'theLoai' => 'max:255',
            'soLuong' => 'required|numeric|min:1|max:99999',
            'soTrang' => 'required|numeric|min:1|max:99999',
            'ngayXB' => 'required|before:tomorrow',
            'moTa' => 'max:2000'
        ];
    }
}
