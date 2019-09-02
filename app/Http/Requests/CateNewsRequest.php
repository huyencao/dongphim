<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateNewsRequest extends FormRequest
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
            'name' => 'required|unique:cate_news|max:50',
            'status' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên danh mục!',
            'name.unique' => 'Tên danh mục đã tồn tại!',
            'name.max' => 'Tên danh mục không thể vượt quá 50 ký tự',
            'status.required' => 'Bạn chưa chọn trạng thái danh mục'
        ];
    }
}
