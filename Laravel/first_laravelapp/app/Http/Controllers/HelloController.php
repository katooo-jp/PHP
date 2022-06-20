<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller {
    public function index() {
        return view('hello.index', ['msg'=>'メッセージを入力してください']);
    }

    public function post(Request $request) {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
        $this->validate($request, $validate_rule);
        return view('hello.index', ['msg'=> $request->name.'は正しく入力された']);
    }
}


// view(フォルダ名.ファイル名, params)
// resoucesのviewsから検索してテンプレートを返す
// 第2引数でパラメータを連想配列で渡せる

// urlクエリはRequestで受け取りviewで渡す
// public function index(Request $request) {
//     $params = ['url_query'=>$request->url_query];
//     return view('hello.index', $params);
// }


// ------- Requestの主なメソッド ---------
// ->url()
// アクセスしたURLを返す。クエリー文字列は省略される

// ->fullUrl()
// クエリー文字列も含めてURLを返す

// ->path()
// ドメイン下のパス部分を返す
// -----------------------------------


// -------- Responseの主なメソッド ------------
// ->status()
// アクセスに関するステータスコードを返す。正常は200

// ->content()
// ->setContent(値)
// コンテンツの取得・設定
// content()で取得、setContent()で引数の値をコンテンツに変更
// ----------------------------------



// -------- バリデーション ----------
// 継承しているControllerクラスに備わっているトレイトに->validateメソッドがある
// $this.validate($request, 検証設定の配列);
// 検証設定の配列
// [
//     '項目名'=>'割り当てる検証ルール',
//     '項目名'=>'割り当てる検証ルール',
//     '項目名'=>'割り当てる検証ルール','割り当てる検証ルール2',
// ]
// で渡す

// エラーがあれば $errors に格納される
// $errors->has(項目名);
    // 個別でエラーが出ているか確認
// $errors->first(項目名);
// エラーメッセージを取得できる
// ---------------------------------
