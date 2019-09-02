<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'name' => 'required|unique:news',
            'cate_id' => 'required',
            'status' => 'required',
            'slug' => 'unique:news',
            'fImage' => 'required|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'Bạn chưa nhập tên bài viết!',
            'name.unique'      => 'Tên bài viết đã tồn tại!',
            'slug.unique' => 'Đường dẫn đã tồn tại',
            'cate_id.required' => 'Chưa chọn danh mục bài viết',
            'status.required' => 'Chưa chọn trạng thái bài viết',
            'fImage.required' => 'Bạn chưa chọn ảnh sản phẩm',
            'fImage.max' => 'Kích thước ảnh quá lớn'
        ];
    }
}
