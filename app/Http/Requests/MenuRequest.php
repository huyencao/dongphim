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
            'title' => 'required|unique:menus',
            'link' => 'required|unique:menus',
            'position' => 'required|unique:menus',
            'type' => 'required',
            'status' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Bạn chưa nhập tên menu!',
            'title.unique' => 'Tên menu đã tồn tại!',
            'link.required' => 'Bạn chưa nhập đường dẫn menu',
            'link.unique' => 'Đường dẫn đã tồn tại',
            'position.required' => 'Bạn chưa nhập vị trí menu',
            'position.unique' => 'Vị trí đã tồn tại',
            'type.required' => 'Bạn chưa chọn loại menu',
            'status.required' => 'Bạn chưa chọn trạng thái menu'
        ];
    }
}
