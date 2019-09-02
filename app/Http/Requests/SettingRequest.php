<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_address' => 'required|max:100',
            'site_email' => 'required|email',
            'site_phone' => 'required|min:10|max:12',
            'site_hotline' => 'required|min:10|max:15',
            'site_coppyright' => 'required|max:100',
            'code_maps' => 'required',
        ];
    }

    public function messages()

    {
        return [
            'site_address.required' => 'Bạn chưa nhập địa chỉ công ty',
            'site_address.max' => 'Tên công ty không hợp lệ',
            'site_email.required' => 'Địa chỉ email không hợp lệ',
            'site_email.email' => 'Địa chỉ email không hợp lệ',
            'site_phone.required' => 'Bạn chưa nhập số điện thoại',
            'site_phone.min' => 'Số điện thoại không hợp lệ',
            'site_phone.max' => 'Số điện thoại không hợp lệ',
            'site_hotline.required' => 'Bạn chưa nhập hotline',
            'site_hotline.min' => 'Số hotline không hợp lệ',
            'site_hotline.max' => 'Số hotline không hợp lệ',
            'site_coppyright.required' => 'Bạn chưa nhập bản quyền',
            'site_coppyright.max' => 'Bản quyền không hợp lệ',
            'code_maps.required' => ' Bạn chưa nhập địa chỉ google maps',
        ];
    }
}
