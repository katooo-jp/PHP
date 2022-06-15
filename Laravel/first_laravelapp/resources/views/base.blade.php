<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-size: 16pt;
            color:#999;
            margin: 5px;
        }
        h1 {
            font-size: 50pt;
            text-align: right;
            color:#ddd;
            margin:-20px 0 -30px 0;
            letter-spacing: -4pt;
        }
        hr {
            margin: 25px  100px;
            border-top: 1px dashed #ddd;
        }
        .menutitle {
            font-size:14pt;
            font-weight: bold;
            margin: 0;
        }
        .content {
            margin: 10px;
        }
        .footer {
            text-align: right;
            font-size: 10pt;
            margin:10px;
            border-bottom: solid 1px #ccc;
            color:#ccc;
        }
    </style>
    <title>@yield('title')</title>
</head>
<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <h2 class="menutitle">※メニュー</h2>
    <ul>
        <li>@show</li>
    </ul>
    <hr size="1">
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>
</html>


<!-- ーーーーーBladeテンプレートーーーーー -->
<!--
    〇〇.blade.phpで作成
    〇〇.phpと〇〇.blade.pjpがあれば〇〇.blade.phpのテンプレートが優先
    変数の表示は｛{変数}｝で簡易化

    ＜〜〜　ディレクティブ　〜〜＞
    ・if
    ＠if(条件)
        処理
    ＠elseif(条件)
        処理
    ＠else
        処理
    ＠endif

    ・unless
    条件非成立の場合
    ＠unless(条件)
        処理
    ＠endunless

    ・empty
    変数が空の場合
    ＠empty(変数)
        処理
    ＠endempty

    ・isset
    変数が定義済みの場合
    ＠isset
        処理
    ＠endisset

    ・for
    ＠for(初期化; 条件; 後処理)
    ＠endfor

    ・foreach
    ＠foreach($配列 as $変数)
    ＠endforeach

    ・forelse
    ＠forelse($配列 as $変数)
        表示内容
    ＠empty
        変数が空の時の表示
    ＠endforelse

    ・while
    ＠while(条件)
    ＠endwhile

    ＠break
    ＠continue

    ・$loop
    繰り返しディレクティブには「$loop」という特別な変数が用意されている
    この変数で繰り返しに関する情報を得ることができる
    $loop->index
        現在のインデックス（０開始）
    $loop->iterarion
        現在の繰り返し回数（１開始）
    $loop->remaining
        あと何回繰り返すか（残り回数）
    $loop->count
        繰り返しで使っている配列の要素数
    $loop->first
        最初の繰り返しかどうか（最初ならtrue）
    $loop->last
        最後の繰り返しかどうか（最後ならtrue）
    $loop->depth
        繰り返しのネスト数
    $loop->parent
        ネストしている場合、親の繰り返しのループ変数を示す

    ・php
    ＠php
        phpのスクリプト
    ＠endphp

    ・レイアウト関連
    ＠extends('拡張子なしfile名')
        resources/views直下のtemplateの継承

    ＠section('名前','値') or
    ＠section('yield名前')
        表示内容
    ＠endsection
        子のテンプレートで＠yieldの名前をつけてsectionの継承上書き

    ＠show
        一番土台となるレイアウトでsectionを用意する場合は＠showで終わる

    ＠yield('名前')
        ＠yieldで指定した名前のセクションがあると、そのセクションが＠yieldのところにはめ込まれる
        ＠yieldは配置場所を示す役割

    ＠parent
        継承後、親のsectionの内容を残す場合はこのディレクティブを使う

    ＠component

    ＠each
    ＜〜〜〜〜〜〜〜〜〜〜〜〜〜〜＞
-->
<!-- ーーーーーーーーーーーーーーーーーーー -->
