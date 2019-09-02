<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomRequest extends FormRequest
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
            'name' => 'required|unique:class_room|max:50',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên lớp học',
            'name.unique' => 'Tên lớp học đã tồn tại',
            'name.max' => 'Tên không thể lớn hơn 50 ký tự',
            'status.required' => 'Bạn chưa chọn trạng thái lớp học'
        ];
    }
}
