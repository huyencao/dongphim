<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => 'required|min:6|max:50',
            'phone' => 'required|min:10|max:12',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập họ tên.',
            'name.min' => 'Tên tài khoản phải lớn hơn 6 ký tự.',
            'name.max' => 'Tên tài khoản phải nhỏ hơn 50 ký tự.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'phone.min' => 'Số điện thoại bạn nhập phải lớn hơn 10 ký tự',
            'phone.max' => 'Số điện thoại bạn nhập phải nhỏ hơn 12 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không đúng định dạng.',
        ];
    }
}
