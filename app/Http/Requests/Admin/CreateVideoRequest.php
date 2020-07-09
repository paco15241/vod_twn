<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'          => 'required|max:500',
            'title_en'       => 'nullable|max:500',
            'description'    => 'nullable',
            'description_en' => 'nullable',
            'year'           => 'nullable|digits:4',
            'poster_url'     => 'nullable|max:2083',
            'imdb_id'        => 'nullable|max:100',
            'atmovies_id'    => 'nullable|max:100',
            'douban_id'      => 'nullable|max:100',
            'status'         => 'boolean',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => '請輸入標題',
            'max' => '長度不能超過 :max 字元',
            'year.digits' => '請輸入正確的年份'
        ];
    }


}
