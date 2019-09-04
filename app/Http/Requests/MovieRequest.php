<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'name' => 'required|unique:movies|max:191',
            'slug' => 'required|unique:movies|max:191',
            'info' => 'required', // thong tin phim
            'production_year' => 'required',//nam sx
            'show_times' => 'required', //lich chieu
            'content' => 'required',
            'air_date' => 'required',//ngay cong chieu
            'movie_duration' => 'required', //thoi luong phim
            'directors' => 'required', // dao dien
            'cate_id' => 'required',
            'status' => 'required',
            'fImage' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên bộ phim.',
            'name.unique' => 'Tên bộ phim đã tồn tại.',
            'name.max' => 'Tên bộ phim không thể vượt quá 191 ký tự',
            'slug.required' => 'Bạn chưa nhập đường dẫn tĩnh.',
            'slug.unique' => 'Đường dẫn tĩnh đã tồn tại.',
            'slug.max' => 'Tên bộ phim không thể vượt quá 191 ký tự',
            'info.required' => 'Bạn chưa nhập thông tin phim.',
            'production_year.required' => 'Bạn chưa nhập năm sản xuất.',
            'show_times.required' => 'Bạn chưa nhập thông tin - lịch chiếu.',
            'content.required' => 'Bạn chưa nhập nội dung phim.',
            'air_date.required' => 'Bạn chưa nhập ngày công chiếu phim.',
            'movie_duration.required' => 'Bạn chưa nhập thời lượng phim.',
            'directors.required' => 'Bạn chưa nhập đạo diễn phim.',
            'cate_id.required' => 'Bạn chưa chọn danh mục phim.',
            'status.required' => 'Bạn chưa chọn trạng thái phim.',
            'fImage.required' => 'Bạn chưa chọn ảnh phim.',
        ];
    }
}
