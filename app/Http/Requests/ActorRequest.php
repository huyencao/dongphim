<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorRequest extends FormRequest
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
            'name' => 'required|unique:actor|max:100',
            'slug' => 'required|unique:movies|max:100',
            'fImage' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên diễn viên.',
            'name.unique' => 'Tên diễn viên đã tồn tại.',
            'name.max' => 'Tên diễn viên không thể lớn hơn 100 ký tự.',
            'slug.required' => 'Bạn chưa nhập đường dẫn tĩnh.',
            'slug.unique' => 'Đường dẫn tĩnh đã tồn tại.',
            'slug.max' => 'Đường dẫn tĩnh không thể lớn hơn 100 ký tự.',
            'fImage.required' => 'Bạn chưa chọn ảnh diễn viên.',
        ];
    }
}
