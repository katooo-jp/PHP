<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>study01</title>
</head>
<body>
    <pre>
    <?php
    $meat = "チキンタツタ";
    $fish = "サーモンソテー";
    $colors = array("red","blue","green");
    $now = new DateTime();

    $a = 500;
    $b = 1000;
    $c = $b++;
    $d = ++$b;
    var_dump($colors);
    var_dump($now);
    var_dump($a);
    ?>
    </pre>
    <div>
        <h1>
            <?= $meat; ?><br>
            <?= "今日のラッキーカラーは{$colors[0]}です";?>
        </h1>
        <p>
            <?= $now->format('Y-m-d H:i:s'); ?><br>
            <?= $a . $b; ?><br>
            <?= $a + $b; ?><br>
            <?= $c; ?><br>
            <?= $d; ?><br>
            <?= $a += 1000; ?>
        </p>
    </div>
    <br><br>
    <br><br>
    <br><br>
</body>
</html>

$変数名 = 代入する要素;で宣言

<?php const $変数名; ?> で定数宣言。変数名は慣例として全て大文字

文字連結には”.”を使う

<?php echo $変数名; ?>でhtmlタグで囲んで表示する
<?= $変数名; ?>も上記と同じ。echoの省略形。

<!-- var_dump(); -->
デバッグ用関数　<pre>タグで囲むと見やすくなる