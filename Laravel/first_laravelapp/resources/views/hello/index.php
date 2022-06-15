<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {font-size:16pt; color:#999;}
        h1 {font-size:100pt; text-align:right; color:#eee;
            margin:-40px 0px -100px 0;}
    </style>
    <title>Hello/Index</title>
</head>
<body>
    <h1>index</h1>
    <p><?= $msg; ?></p>
    <p>ID=<?= $id; ?></p>
</body>
</html>


<!-- コントローラーから受け取ったパラメータを変数として扱う -->

<!-- ーーーーーBladeテンプレートーーーーー -->
<!--
    〇〇.blade.phpで作成
    〇〇が同一のテンプレートがある場合は.blade.phpのテンプレートが優先される
    変数の表示は{{$変数}}で簡易化
-->
<!-- ーーーーーーーーーーーーーーーーーーー -->
