<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAcountEditRequest extends FormRequest
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
            'name_bank' => 'max:100',
            'number_acount' => 'required|max:50',
            'branch_acount' => 'required|max:100',
            'status' => 'required',
            'fImage' => 'image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên tài khoản',
            'name.max' => 'Tên  tài khoản không hợp lệ',
            'number_acount.required' => 'Bạn chưa nhập số tài khoản',
//            'name_bank.required' => 'Bạn chưa nhập tên ngân hàng',
            'name_bank.max' => 'Tên ngân hàng không hợp lệ',
            'number_acount.max' => 'Số tài khoản không hợp lệ',
            'branch_acount.required' => 'Bạn chưa nhập chi nhánh tài khoản',
            'branch_acount.max' => 'Chi nhánh tài khoản không hợp lệ',
            'status.required' => 'Bạn chưa chọn trạng thái',
//            'fImage.required' => 'Bạn chưa chọn ảnh',
            'fImage.max' => 'Kích thước ảnh quá lớn'
        ];
    }
}
