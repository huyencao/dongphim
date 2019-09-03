<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'name' => 'required|unique:banners|max:100',
            'status' => 'required',
            'fImage' => 'required|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên banner.',
            'name.unique' => 'Tên banner đã tồn tại.',
            'name.max' => 'Tên banner không vượt quá 100 ký tự.',
            'status.required' => 'Bạn chưa chọn trạng thái banner.',
            'fImage.required' => 'Bạn chưa chọn ảnh banner.',
            'fImage.max' => 'Kích thước ảnh quá lớn.'
        ];
    }
}
