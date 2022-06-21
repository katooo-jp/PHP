<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller {
    public function index() {
        $items = DB::select('select * from people');
        return view('hello.index', ['items'=>$items]);
    }

    public function post(Request $request) {
        // $validate_rule = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric|between:0,150',
        // ];
        // $this->validate($request, $validate_rule);

        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'mail' => 'email',
                'age' => 'numeric|between:0,150',
        ]);
        if ($validator->fails()) {
            return redirect('/hello')
                            ->withErrors($validator)
                            ->withInput();
        }
        return view('hello.index', ['msg'=> '正しく入力された']);
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
// 検証ルール一覧
// ・accept ・active_url ・url ・after:日付 ・after_or_equel:日付 ・before:日付 ・before_or_equal:日付
// ・alpha ・alpha-dash ・alpha-num ・array ・bail ・between:最小値,最大値 ・boolean ・confirmed
// ・date ・date_equels:日付 ・date_dormat:フォーマット ・different:フィールド ・same:フィールド
// ・digits:桁数 ・same:フィールド ・digits:桁数 ・digits_between:最小桁数,最大桁数 ・dimensions:設定内容
// ・distinct ・email ・exists:テーブル,カラム ・file ・filled ・required ・image ・gt:項目 ・gte:項目
// ・lt:項目 ・lte:項目  etc...

// エラーがあれば $errors に格納される
// $errors->has(項目名);
    // 個別でエラーが出ているか確認
// $errors->first(項目名);
// エラーメッセージを取得できる
// ---------------------------------

// -------- Requestにようるバリデーション ----------
// フォームのバリデーションはコントロールにあるよりフォーム内で行うほうが良い
// laravelではRequestクラスを継承してFormRequestがあり、これでリクエストでバリデーションを行える
// 引数で受け取るRequestを継承して作ったRequestに変更して利用
// app/Http/Requests/HelloRequest.php記載
// ---------------------------------------------


// ------------------DBの利用-----------------------
// laravelのDB利用は　'DBクラス'　や　'Eloquent(ORM)'　がある

// ＿＿＿DBクラス＿＿＿
// SQLクエリを直接実行するのに近い感じで使える
// DB::select('SQL文');
// DB::insert('SQL文');
// DB::update('SQL文');
// DB::delete('SQL文');
// DB::table('テーブル名')->get('カラム名');
// 引数がなければ全カラム

// ＿＿＿Eloquent(ORM)＿＿＿
// PHPのオブジェクトに近い形でDBを扱える


// ------------------------------------------------
