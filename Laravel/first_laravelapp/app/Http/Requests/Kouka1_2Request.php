<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Kouka1_2Request extends FormRequest
{

    public function authorize()
    {
        if ($this->path() ==  'kouka1_2') {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'name' => 'required|max:10',
            'age' => 'required|integer',
            'mail' => 'required|email',
            'school' => 'required|max:20',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力して下さい。',
            'name.max' => '名前は10文字以内で入力して下さい。',
            'age.required'  => '年齢は必ず入力して下さい。',
            'age.integer'  => '年齢は整数で入力して下さい。',
            'age.between'  => '年齢は0～150の間で入力して下さい。',
            'mail.required' => 'メールは必ず入力して下さい。',
            'mail.email' => 'メールアドレスが必要です。',
            'school.required' => '学校名は必ず入力して下さい。',
            'school.max' => '学校名は20文字以内で入力して下さい。',

        ];
    }
}
