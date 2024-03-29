<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required|unique:menus',
            'slug' => 'required|unique:menus',
            'position' => 'required|unique:menus',
            'status' => 'required',
            'cate_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên menu.',
            'name.unique' => 'Tên menu đã tồn tại.',
            'slug.required' => 'Bạn chưa nhập đường dẫn menu.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'position.required' => 'Bạn chưa nhập vị trí menu.',
            'position.unique' => 'Vị trí đã tồn tại.',
            'status.required' => 'Bạn chưa chọn trạng thái menu.',
            'cate_id.required' => 'Bạn chưa chọn danh mục phim.'
        ];
    }
}
