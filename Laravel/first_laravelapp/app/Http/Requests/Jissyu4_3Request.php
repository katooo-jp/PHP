<?php

namespace App\Http\Requests;

use App\Rules\Jissyu4_3Myrule;
use Illuminate\Foundation\Http\FormRequest;

class Jissyu4_3Request extends FormRequest
{
    public function authorize()
    {
        if ($this->path() ==  'jissyu4_3') {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'name' => 'required|max:10',
            'adress' => 'required|max:20',
            'login_id' => ['required', 'between:8,16',new Jissyu4_3Myrule()],
            'password' => 'required|between:8,16',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力して下さい。',
            'name.max' => '名前は10文字以内で入力して下さい。',
            'adress.required'  => '住所は必ず入力して下さい。',
            'adress.max'  => '住所は20文字以内で入力して下さい。',
            'login_id.required' => 'ログインIDは必ず入力して下さい。',
            'login_id.between' => 'ログインIDは8文字以上16文字以内で入力して下さい。',
            'password.required' => 'パスワードは必ず入力して下さい。',
            'password.between' => 'パスワードは8文字以上16文字以内で入力して下さい。',
        ];
    }
}

