<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditActorRequest extends FormRequest
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
            'name' => 'required|max:100',
            'slug' => 'required|max:100',
//            'fImage' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên diễn viên.',
            'name.max' => 'Tên diễn viên không thể lớn hơn 100 ký tự.',
            'slug.required' => 'Bạn chưa nhập đường dẫn tĩnh.',
            'slug.max' => 'Đường dẫn tĩnh không thể lớn hơn 100 ký tự.',
        ];
    }
}
