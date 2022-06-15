<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller {
    public function index(Request $request) {
        $data = [
            'msg'=>'',
        ];
        return view('hello.index', $data);
    }

    public function post(Request $request) {
        $msg = $request->msg;
        $data = ['msg'=> $msg];
        return view('hello.index', $data);
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
