<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCateMovieRequest extends FormRequest
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
            'name' => 'required|max:50',
            'slug' => 'required',
            'status' => 'required',
            'fImage' => 'max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên danh mục.',
            'name.max' => 'Tên danh mục không thể vượt quá 50 ký tự',
            'slug.required' => 'Bạn chưa nhập đường dẫn tĩnh.',
            'status.required' => 'Bạn chưa chọn trạng thái danh mục.',
            'fImage.max' => 'Kích thước ảnh quá lớn.'
        ];
    }
}
