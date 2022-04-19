<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>study02</title>
</head>
<body>
    <pre>
    <?php
    $t = True;
    $f = False;
    $a = 100;
    $b = 50;
    $c = $d = $e = 1000;
    $men = "男";
    $women = "女";
    $sports = ["野球","サッカー",NULL,"剣道","バレー","バスケ",NULL];
    $ran = rand(0,6);
    ?>
    </pre>

    <div>
    <!-- if文 -->
    <p>
    <?php
    if($a == 50) {
        echo "＄a=50です";
    }else {
        echo "＄a=50ではありません";
    }
    ?>
    </p>
    <!-- ifコロン文 -->
    <?php if ($men == "男" and $a == 1000):?>
        <p>＄menは男です</p>
    <?php elseif ($men == "女" or $b == 50):?>
        <p>＄menは女です</p>
    <?php endif;?>

    <!-- 乱数 -->
    <p>乱数＝<?= $ran; ?></p>

    <!-- switch文 コロンVer-->
    <!-- 注:最初のswitch文にcase入れないとエラー -->
    <?php switch($ran):
        case 0:?>           
            <p>乱数は0です</p>
        <?php case 1:?>
            <p>乱数は1です</p>
        <?php default:?>
            <p>乱数は3以上です</p>
    <?php endswitch; ?>

    <!-- match文 -->
    <?php
    $furtune = match($ran) {
        0,1 => "大吉",
        2,3 => "中吉",
        4,5 => "小吉",
        6 => "凶",
    };
    ?>
    <p>今日の運勢は<?= $furtune; ?></p>

    <!-- while文 -->
    <?php while($a < 400):
        $a += $b;
        echo "<p>$a</p>";
    endwhile;
    ?>

    <!-- for文 -->
    <select>
        <?php for($i = 0; $i < count($sports); $i++):
            echo "<option value='$i'>$i</option>";
        endfor;?>
    </select>
    
    </div>
    <br><br>
    <br><br>
    <br><br>
</body>
</html>





<!-- 比較演算子 -->
他言語とほぼ同じ。

<!-- 宇宙演算子 -->
”左 <=> 右” 左右の大きさを判定する演算子
左＞右なら１を、左＜右なら−１を、左==右なら０を返す

<!-- NULL合体演算子 -->
”左 ?? 右” 左がNULLなら（右）を返す
<!-- 
例1:
<?php
$a = NULL;
$b = 250 * ($a ?? 0);
?>  -->
$aはNULLのままで、$bは250*0で0とる。

<!--
例2:
<?php
$a = NULL;
$a ??= 3;
?>  -->
$aはNULLなので3に初期化される

<!-- その他”ビット演算子”、”キャスト演算子”、”型演算子”あり。 -->

<!-- if文JavaScriptと同じ -->
<!-- ”:”で区切った文法もあり。「else if」を空白で区切らずelseifと書き、最後はendifで終わる。
条件によってHTML文を変えたい時に利用する。 -->

<!-- switch文もJavaScriptと同じ-->
ifと同じく":"で区切った文法がある
<!-- match式 -->
match式は複数の値を列挙でき、switchはcaseに一つの値しか指定できない。
matchはswitchと違い該当する値がなければエラーを返す。
matchは値を返し、switchは値を返さない。

<!-- while文do-while文はjavaと同じ -->
while文も":"で区切った文法がある。

<!-- for文もjavaと同じ -->
for文も":"で区切った文法がある。