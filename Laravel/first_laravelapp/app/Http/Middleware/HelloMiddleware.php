<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware {
    // 前処理
    // public function handle($request, Closure $next) {
    //     $data = [
    //         ['name'=>'taro', 'mail'=>'taro@yamada'],
    //         ['name'=>'hanako', 'mail'=>'hanako@flower'],
    //         ['name'=>'sachiko', 'mail'=>'sachiko@happy'],
    //     ];
    //     $request->merge(['data'=>$data]);
    //     return $next($request);
    // }

    // 後処理(例)
    // middlewareタグをaタグへ置き換える処理
    public function handle($request, Closure $next) {
        $response = $next($request);
        $content = $response->content();

        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);
        $response->setContent($content);
        return $response;
    }
}


// Middlewareにはhandoleというメソッドが一つだけ用意されている
// 第一引数はrequestが渡され、第２引数のClosureクラスのインスタンスを使ってリクエストを返している

// ミドルウェアの利用には app/Http/Kernel.php の $routeMiddleware に代入している変数内に追記する
    // 'hello' => \App\Http\Middleware\ミドルウェアクラス名::class,

// ミドルウェアの実行方法は色々
// 利用するミドルウェアと呼び出す処理の追記が必要。一般にルーティングの際に実行。
    // Route::get(...)->middleware(...)->middleware(...);
// ミドルウェアをグループ登録すれば->middleware()に渡す引数を簡易化して書けるように

// グローバルミドルウェアに追記すれば->meddleware()なしで全てのルートに追記したmiddlewareが呼び出される
// app/Http/Kernel.php の　protected $middleware に追記

// $request->merge(配列);
// フォームの送信などで送られる値に新たな値を追加するもの
// コントローラー側で $request->data でこの値を取り出すことができる

// $response->setContent(要素)で返す値を設定

// Middlewareの前処理と後処理の記述の違い
// 前処理
//     public function handle($request, Closure $next) {
//         前処理記述
//         return $next($request);
//     }
// 後処理
//     public function handle($request, Closure $next) {
//         $response = $next($request);
//         後処理記述
//         return $response;
//     }

