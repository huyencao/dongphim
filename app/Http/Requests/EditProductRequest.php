<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'cate_id' => 'required',
            'price_old' => 'required|numeric|min:0|not_in:0',
//            'sale' => 'not_in:0',
            'publishing_company' => 'required',
            'number_page' => 'required|numeric|min:0|not_in:0',
            'description' => 'required',
            'total' => 'required|numeric||min:0|not_in:0',
            'detail' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm.',
            'slug.required' => 'Bạn chưa nhập đường dẫn tĩnh',
            'cate_id.required' => 'Bạn chưa chọn danh mục sản phẩm.',
            'price_old.required' => 'Bạn chưa nhập giá sản phẩm.',
            'price_old.required' => 'Bạn chưa nhập giá sản phẩm.',
            'price_old.numeric' => 'Giá sản phẩm nhập vào phải là số.',
            'price_old.min' => 'Giá sản phẩm nhập vào phải lớn hơn 0.',
            'price_old.not_in' => 'Giá sản phẩm không phải là 0.',
            'publishing_company.required' => 'Bạn chưa nhập tên nhà xuất bản.',
            'number_page.required' => 'Bạn chưa nhập số trang.',
            'number_page.numeric' => 'Số trang sách nhập vào phải là số.',
            'number_page.min' => 'Số trang sách phải lớn hơn 0.',
            'number_page.not_in' => 'Số trang sách không phải là 0.',
//            'sale.not_in' => '% khuyến mãi phải lớn hơn 0.',
            'description.required' => 'Bạn chưa nhập mô tả ngắn.',
            'total.required' => 'Bạn chưa nhập số quyển sách.',
            'total.numeric' => 'Số quyển sách nhập vào phải là số.',
            'total.min' => 'Số quyển sách phải lớn hơn 0.',
            'total.not_in' => 'Số quyển sách không thể bằng 0.',
//            'total.min' => 'Số quyển sách phải lớn hơn 0',
            'detail.required' => 'Bạn chưa nhập thông tin sản phẩm.',
        ];
    }
}
