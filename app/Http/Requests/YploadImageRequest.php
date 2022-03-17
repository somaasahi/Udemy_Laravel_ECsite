<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YploadImageRequest extends FormRequest
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
            'image' =>  'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'image' => '画像ではありません',
            'mimes' => '拡張子はjpg,jpeg,pngのみです',
            'max' => 'サイズを2MB以内にしてください',
        ];
    }
}
