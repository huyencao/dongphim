<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMenuRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required',
            'position' => 'required',
            'status' =>'required',
//            'cate_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên menu.',
            'slug.required' => 'Bạn chưa nhập đường dẫn menu.',
            'position.required' => 'Bạn chưa nhập vị trí menu.',
            'status.required' => 'Bạn chưa chọn trạng thái menu.',
//            'cate_id.required' => 'Bạn chưa chọn danh mục phim.'
        ];
    }
}
