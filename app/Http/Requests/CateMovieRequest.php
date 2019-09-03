<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateMovieRequest extends FormRequest
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
            'name' => 'required|unique:cate_movie|max:50',
            'slug' => 'required|unique:cate_movie',
            'status' => 'required',
            'fImage' => 'required|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên danh mục.',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'name.max' => 'Tên danh mục không thể vượt quá 50 ký tự',
            'slug.required' => 'Bạn chưa nhập đường dẫn tĩnh.',
            'slug.unique' => 'Đường dẫn tĩnh đã tồn tại.',
            'status.required' => 'Bạn chưa chọn trạng thái danh mục.',
            'fImage.required' => 'Bạn chưa chọn ảnh danh mục.',
            'fImage.max' => 'Kích thước ảnh quá lớn.'
        ];
    }
}
