<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
            'name' => 'required|unique:social|max:100',
            'link' => 'required|unique:social|max:100',
            'status' => 'required',
            'fImage' => 'required|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên mạng xã hội',
            'name.unique' => 'Tên mạng xã hội đã tồn tại',
            'name.max' => 'Tên  mạng xã hội không hợp lệ',
            'link.required' => 'Bạn chưa nhập đường dẫn mạng xã hội',
            'link.unique' => 'Đường dẫn mạng xã hội đã tồn tại',
            'link.max' => 'Đường dẫn không hợp lệ',
            'status.required' => 'Bạn chưa chọn trạng thái',
            'fImage.required' => 'Bạn chưa chọn ảnh mạng xã hội',
            'fImage.max' => 'Kích thước ảnh quá lớn'
        ];
    }
}
