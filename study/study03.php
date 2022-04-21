<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>study03</title>
</head>
<body>
    <?php
    // 関数定義
    function warikan(int $nin, int $kin){
        static $count = 0;
        $count++;
        $wari = $kin / $nin;
        echo $count,"回目の実行です",PHP_EOL;
        echo "今回は",number_format($kin),"を{$nin}人で割り勘して",number_format($wari),"円です";
    }

    // ラムダ式
    $uru = function(int $nen):string{
        if ($nen % 4 == 0 and !($nen % 100 == 0) or $nen % 400 == 0):
            $msg = "{$nen}年はうるう年です。";
        else:
            $msg = "{$nen}年は平年です。";
        endif;
        return $msg;
    };

    ?>
    <div>
        <p><?php warikan(4,2000);?></p>
        <p><?php warikan(100,200000000);?></p>
        <?php
        $nen = 2020;
        while($nen <= 2030):
            echo "<p>{$uru($nen)}</p>";
            $nen++;
        endwhile;
        ?>
    </div>
    <br><br>
    <br><br>
    <br><br>
</body>
</html>

<!-- 関数定義 -->
function 関数名($引数１, $引数2=初期値, ...){
    処理
    return 戻り値;
}
引数を固定しない方法は二種類
...$変数名をしてするか、関数定義時に引数をなしにする
型指定もできる
function 関数名(型1|型2 $引数１, 型 $引数2=初期値, ...):型{
    処理
    return 戻り値;
}

<!-- グローバル変数 -->
関数内で関数外の変数を利用する場合
global $変数名;

<!-- static変数 -->
static $変数名 = 初期値;
関数が呼ばれた最初だけ処理され、値を保持し続ける。

<!-- 変数の参照渡し -->
function 関数名(&$引数){
    処理
    return 戻り値;
}
参照私は関数定義時の引数に"&"をつける
つけなければ値のみ渡す

<!-- 可変変数 -->
$$変数名;
$($変数)のように変数名を変数で指定できる

<!-- 可変関数 -->
function_exists()を利用して関数名を可変する

<!-- ラムダ関数 -->
$変数名 = function($引数1, $引数2){処理 return 戻り値};
変数名が関数名になる



