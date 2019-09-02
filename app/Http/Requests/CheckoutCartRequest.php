<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutCartRequest extends FormRequest
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
            'name' => 'required|max:50|mix:5',
            'phone' => 'required|min:10|max:12',
            'email' => 'required|email',
            'province' => 'required',
            'district' => 'required',
            'payment_method' => 'required',
            'content' => 'max:250'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.min' => 'Họ tên không hợp lệ',
            'name.max' => 'Họ tên không hợp lệ',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.min' => 'Số điện thoại không hợp lệ',
            'phone.max' => 'Số điện thoại không hợp lệ',
            'email.required' => 'Bạn chưa nhập địa chỉ email',
            'email.email' => 'Email không đúng định dạng',
            'province.required' => 'Bạn chưa chọn tỉnh/thành phố',
            'district.required' => 'Bạn chưa chọn quận/huyện',
            'payment_method.required' => 'Bạn chưa chọn phương thức thanh toán',
            'content.max' => 'Nội dung không lớn hơn 250 ksy tự'
        ];
    }
}
