<?php
// HTMLエスケープ関数
function es(array|string $data, string $charset='UTF-8'):mixed {
    // 配列ならば
    if (is_array($data)):
        return array_map(__METHOD__, $data); // 配列を一つずつ取り出しesを再帰呼び出し
    else:
        return htmlspecialchars($data, flags:ENT_QUOTES, encoding:$charset);
    endif;
}

// 利用環境の文字エンコードと与えられたデータ（配列で与える）と同じならTrue
function cken(array $data): bool {
    $result = true;
    foreach ($data as $key => $value){
        // 配列なら連結して文字列へ変換
        if (is_array($value)):
            $value = implode("", $value);
        endif;

        // 利用環境の文字エンコードと比較
        if (!mb_check_encoding($value)):
            $result = false;
            break;
        endif;
    }
    return $result;
}

// POSTデータのエスケープ処理(xss対策)
$_POST = es($_POST);


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST['name']) {
        $posd = $_POST['name'];
        // $posd = mb_convert_encoding($_POST['name'], 'shift-JIS');
        if (cken($_POST)):
            $msg = "こんにちは、$posd さん";
        else:
            $enc = mb_internal_encoding();
            $msg = "$enc で入力してください";
        endif;
    }
    else {
        $msg = "文字を入力をしてから送信を押してください";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>study06</title>
</head>
<body>
    <div>
    <h1>バリデーションフォーム</h1>
    <form method="POST" action="">
        <input type="text" name="name">
        <input type="submit" value="送信">
    </form>
    <p><?php if (isset($msg)){ echo $msg; }; ?></p>
    </div>
    <br><br>
    <br><br>
    <br><br>
</body>
</html>

<!-- スーパーグローバル変数 -->
PHPではサーバへのリクエストの情報を操作するための変数がある。
$_GET, $_POST, $_COOKIE, $_SESSION, $_FILES, $_SERVER, $_ENV
また、$_REQUESTなど
それぞれ変数には連想配列で値が格納されている

<!-- URLエンコード -->
rawurlencode();

<!-- エスケープ処理 -->
htmlspecialchars(処理する文字列, flags:ENT_QUOTES, encoding:'UTF-8')

<!-- マジック定数 -->
__METHOD__
現在実行中のメソッド自身を呼び出す特殊な定数の一つ

<!-- 文字エンコード -->
mb_check_encoding(array|string|null $value = null, ?string $encoding = null): bool
第一引数の値が指定した文字コードならTrue
encodingを指定しなければ利用環境の文字エンコードと比較

mb_convert_encoding(array|string $string, string $to_encoding, array|string|null $from_encoding = null): array|string|false
第一引数の値を指定した文字エンコードに変換。できなければfalse

mb_internal_encoding(?string $encoding = null): string|bool
内部文字エンコーディングを設定あるいは取得します。