<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
            'url' => 'required',
            'type' => 'required',
            'movie_id' => 'required',
            'status' => 'required',
            'fImage' => 'required|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên tập phim.',
            'name.max' => 'Tên diễn viên không thể lớn hơn 100 ký tự.',
            'slug.required' => 'Bạn chưa nhập đường dẫn tĩnh.',
            'slug.max' => 'Đường dẫn tĩnh không thể lớn hơn 100 ký tự.',
            'url.required' => 'Bạn chưa nhập link phim.',
            'type.required' => 'Bạn chưa chọn loại tập phim.',
            'movie_id.required' => 'Bạn chưa chọn bộ phim.',
            'status.required' => 'Bạn chưa chọn trạng thái tập phim.',
            'fImage.required' => 'Bạn chưa chọn ảnh tập phim.',
        ];
    }
}
