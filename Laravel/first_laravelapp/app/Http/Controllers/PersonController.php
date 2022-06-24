<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller {
    public function index(Request $request) {
        $items = Person::all();
        return view('person.index', ['items'=> $items]);
    }

    public function find() {
        return view('person/find', ['input'=>'']);
    }

    public function search(Request $req) {
        // $item = Person::find($req->input);

        $item = Person::nameEqual($req->input)->first();
        $params = ['input'=> $req->input, 'item'=>$item];
        return view('person/find', $params);
    }
}


// ＿＿＿＿＿＿Eloquent(エロクアント：ORM)＿＿＿＿＿＿
// PHPのオブジェクトに近い形でDBを扱える

// ~~~~~~~~~~~Modelクラスメソッド一覧~~~~~~~~~~~~
// $変数 = モデルクラス::all();
// すべてのレコードを取得

// $変数 = モデルクラス::find();
// IDによるレコード検索を行うためのメソッド。idというフィールド名でなければ使えない。
// それ以外の名前でプライマリーキーを作っている場合は$primaryKeyというプロバティをモデルクラスに用意してフィールド名を設定して解決

// $変数 = モデルクラス::where(フィールド名, 値)->get();
// 条件検索取得
// $変数 = モデルクラス::where(フィールド名, 値)->first();
// 最初の値のみ取得

// $変数 = モデルクラス::
// $変数 = モデルクラス::
// $変数 = モデルクラス::
// $変数 = モデルクラス::
// $変数 = モデルクラス::
// $変数 = モデルクラス::
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// ~~~~~~~~~~~~~~スコープについて~~~~~~~~~~~~~~~
// whereで繋いで条件検索をすると分かりにくくなることを防ぐためデータを絞り込むための条件をあらかじめ設定するためのもの
// メソッドの呼び出しの際は scope は省略した名前で呼び出し、第一引数も用意せずに利用する
// whereとは違って条件の決まったメソッドでの絞り込みなのでわかりやすい。メソッドチェーンも可能

// ・ローカルスコープ
// モデル内にメソッドを用意して必要に応じて呼び出すことで条件を絞り込む
// public function scope名前($query, 引数) {
//     必要な処理
//     return 絞り込んだビルダ;
// }

// ・グローバルスコープ
// 呼び出しなどせずにそのモデルでのすべてのレコード取得にそのスコープが適用される
// bootというモデルの初期化専用のメソッドを利用して、addGlobalScopeメソッドで処理を記述
// use Illuminate\Database\Eloquent\Builder;　を追加
// protected static function boot() {
//     parent::boot();
//
// static::addGlobalScope(スコープ名, function (Builder $builder) {
//     絞り込み処理
// });
// }

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
