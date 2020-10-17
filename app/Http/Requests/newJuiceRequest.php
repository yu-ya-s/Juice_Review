<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newJuiceRequest extends FormRequest
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
            'star' => 'required',
            'store' => 'required',
            'area' => 'required',
            'pref' => 'gt:0',
            'review' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'star.required' => '評価を選択してください',
            'store.required' => '購入店を入力してください',
            'area.required' => '販売エリアを選択してください',
            'pref.gt:0' => '購入した県を選択してください',
            'review.required' => '飲んだ感想を入力してください',
            'image.required' => '写真を選択してください'
        ];
    }
}
