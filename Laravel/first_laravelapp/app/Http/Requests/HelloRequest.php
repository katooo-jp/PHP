<?php

namespace App\Http\Requests;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest {
    public function authorize() {
        // $this->path()で現在のパスを確認して 'hello'なら許可をしている
        if($this->path() == 'hello') {
            return true;
        }else {
            return false;
        }
    }

    public function rules() {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
    }

    public function messages() {
        return [
        'name.required' => '名前は必ず入力してください',
        'mail.email' => 'メールアドレスが必要です',
        'age.numeric' => '年齢を整数で記入して下さい',
        'age.between' => '年齢は0〜150の間で入力ください',
        ];
    }
}


// -------- Requestにようるバリデーション ----------
// フォームのバリデーションはコントロールにあるよりフォーム内で行うほうが良い
// laravelではRequestクラスを継承してFormRequestがあり、これでリクエストでバリデーションを行える

// authorize
// フォームリクエストを利用するアクションでフォームリクエストの利用が許可をされているか示す
// 戻り地でtrueで許可され、falseで不許可になる

// rules
// 適用されるバリデーション検証ルールを設定する

// 上記の２つのメソッドを用意すればフォームリクエストは使えるようになる
// あとはコントローラーのアクションのpostで受け取るRequestをHelloRequestに変更する

// エラーメッセージのカスタマイズはmessages()を追加
// ---------------------------------------------
