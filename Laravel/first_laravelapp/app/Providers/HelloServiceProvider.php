<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use function PHPSTORM_META\registerArgumentsSet;

class HelloServiceProvider extends ServiceProvider {
    // View::composerの第２引数が関数の場合
    // public function boot() {
    //     View::composer('hello.index', function($view) {
    //         $view->with('view_message', 'composer message!');
    //     });
    // }

    // クラスの場合
    public function boot() {
        View::composer('hello.index', 'App\Http\Composers\HelloComposer');
    }
}

// サービスプロバイダは作成後config/app.phpの'providers'に登録が必要
// 配列内に、　App\Providers\プロバイダ名::class　を追記

// サービスプロバイダはregisterとbootというメソッドが用意されている
// registerメソッドはサービスプロバイダの登録処理を行う。サービスの登録処理はこのメソッドに記述
// bootメソッドはサービスプロバイダへのブートストラップ処理。コンポーザを設定する処理をこのメソッドに用意することで設定したビューをレンダリングの際に自動的にコンポーザが呼び出される

// View::composer(ビューの指定, 関数またはクラス)
// 第１引数には、ビューコンポーザを割り当てるビューを指定し、第２引数には、実行する処理となるクロージャ化ビューコンポーザのクラスを指定。
// 無名関数の引数に$viewを用意。これはIlluminate/View名前空間にあるViewクラスのインスタンス。
// このインスタンスがビューを管理するオブジェクトになり、メソッドを利用してビューを操作することができる

// withメソッド
// $view->with(変数名, 値);
// ビューに変数などを追加するためのもの

// ビューコンポーザクラスを利用する場合はView::composerメソッドの第二引数に、クラス名をテキスト値で入力
