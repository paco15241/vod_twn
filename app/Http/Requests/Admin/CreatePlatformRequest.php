<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlatformRequest extends FormRequest
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
            'platform_name'   => 'required|max:500',
            'vod_id'          => 'nullable|max:100',
            'vod_title'       => 'nullable|max:500',
            'vod_description' => 'nullable',
            'vod_url'         => 'nullable|max:500',
            'vod_provider'    => 'nullable|max:500',
            'on_at'           => 'nullable|date_format:Y-m-d H:i:s',
            'off_at'          => 'nullable|date_format:Y-m-d H:i:s',
            'status'          => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'platform_name.required' => '請輸入平台',
            'max' => '長度不能超過 :max 字元',
            'date_format' => '時間格式須符合 Y-m-d H:i:s'
        ];
    }
}
