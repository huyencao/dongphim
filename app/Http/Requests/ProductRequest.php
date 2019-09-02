<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'slug' => 'required|unique:products',
            'cate_id' => 'required',
            'price_old' => 'required|numeric|min:0|not_in:0',
//            'sale' => 'min:0|not_in:0',
            'publishing_company' => 'required',
            'number_page' => 'required|numeric||min:0|not_in:0',
            'description' => 'required',
            'total' => 'required|numeric|min:0|not_in:0',
            'detail' => 'required',
            'fImage' => 'required|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm.',
            'name.unique' => 'Tên sản phẩm đã tồn tại.',
            'slug.required' => 'Bạn chưa nhập đường dẫn tĩnh.',
            'slug.unique' => 'Đường dẫn tĩnh đã tồn tại.',
            'cate_id.required' => 'Bạn chưa chọn danh mục sản phẩm.',
            'price_old.required' => 'Bạn chưa nhập giá sản phẩm.',
            'price_old.numeric' => 'Giá sản phẩm nhập vào phải là số.',
            'price_old.min' => 'Giá sản phẩm nhập vào phải lớn hơn 0.',
            'price_old.not_in' => 'Giá sản phẩm không phải là 0.',
            'price_old.integer' => 'Giá sản phẩm lớn hơn 0.',
//            'sale.numeric' => '% khuyến mãi nhập vào phải là số',
//            'sale.min' => '% khuyến mãi phải lớn hơn 0',
//            'sale.not_in' => '% khuyến mãi phải lớn hơn 0.',
            'publishing_company.required' => 'Bạn chưa nhập tên nhà xuất bản.',
            'number_page.required' => 'Bạn chưa nhập số trang.',
            'number_page.numeric' => 'Số trang sách nhập vào phải là số.',
            'number_page.min' => 'Số trang sách phải lớn hơn 0.',
            'number_page.not_in' => 'Số trang sách không phải là 0.',
//            'number_page.integer' => 'Số trang phải lớn hơn 0.',
            'description.required' => 'Bạn chưa nhập mô tả ngắn.',
            'total.required' => 'Bạn chưa nhập số quyển sách.',
            'total.numeric' => 'Số quyển sách nhập vào phải là số.',
            'total.min' => 'Số quyển sách phải lớn hơn 0',
            'total.not_in' => 'Số quyển sách không thể bằng 0.',
//            'total.integer' => 'Số quyển sách lơn hơn 0.',
            'detail.required' => 'Bạn chưa nhập thông tin sản phẩm.',
            'fImage.required' => 'Bạn chưa chọn ảnh sản phẩm.',
            'fImage.max' => 'Kích thước ảnh quá lớn.',
        ];
    }
}
