<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMovieRequest extends FormRequest
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
            'name' => 'required|max:191',
            'slug' => 'required|max:191',
            'info' => 'required', // thong tin phim
            'production_year' => 'required',//nam sx
            'show_times' => 'required', //lich chieu
            'content' => 'required',
            'movie_duration' => 'required', //thoi luong phim
            'directors' => 'required', // dao dien
            'status' => 'required',
            'appoint' => 'required',
            'upcoming' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên bộ phim.',
            'name.max' => 'Tên bộ phim không thể vượt quá 191 ký tự',
            'slug.required' => 'Bạn chưa nhập đường dẫn tĩnh.',
            'slug.max' => 'Tên bộ phim không thể vượt quá 191 ký tự',
            'info.required' => 'Bạn chưa nhập thông tin phim.',
            'production_year.required' => 'Bạn chưa nhập năm sản xuất.',
            'show_times.required' => 'Bạn chưa nhập thông tin - lịch chiếu.',
            'content.required' => 'Bạn chưa nhập nội dung phim.',
            'air_date.required' => 'Bạn chưa nhập ngày công chiếu phim.',
            'movie_duration.required' => 'Bạn chưa nhập thời lượng phim.',
            'directors.required' => 'Bạn chưa nhập đạo diễn phim.',
            'status.required' => 'Bạn chưa chọn trạng thái phim.',
            'appoint.required' => 'Bạn chưa chọn phim đề cử.',
            'upcoming.required' => 'Bạn chưa chọn phim sắp chiếu',
        ];
    }
}
