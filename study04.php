<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>study04</title>
</head>
<body>
    <?php
    // 配列作成
    $aa = [1,2,3];
    $bb = [1,2,3,1,2,2,3,4,4,5,6];
    $family = array('小宮','安達','斎藤');
    $personal = ['健太','かける','祐太'];
    ?>
    <div>
        <h1>ソートの確認</h1>
        <p>配列$aaの現在の中身</p>
        <?php
        foreach($aa as $i):
            echo "$i ,";
        endforeach;
        ?>

        <p><br>配列$aaの降順に変更後( rsort()使用 )</p>
        <?php
        rsort($aa);
        foreach($aa as $i):
            echo "$i ,";
        endforeach;
        echo PHP_EOL;
        ?>

        <h1>配列の重複削除と連結</h1>
        <?php
        echo "＄aaの中身:";
        foreach($aa as $i):
            echo "$i ,";
        endforeach;
        echo PHP_EOL;

        echo "＄bbの中身:";
        foreach($bb as $i):
            echo "$i ,";
        endforeach;
        echo PHP_EOL;
        ?>

        <p>二つの配列を連結して$cc作成（ array_merge() ）</p>
        <?php
        $cc = array_merge($aa,$bb);
        echo "＄ccの中身:";
        foreach($cc as $i):
            echo "$i ,";
        endforeach;
        echo PHP_EOL;
        ?>

        <p>$ccから重複削除して$dd作成( array_unique() )</p>
        <?php
        $dd = array_unique($cc);
        echo "削除後の＄ddの中身:";
        foreach($dd as $i):
            echo "$i ,";
        endforeach;
        echo "<br>重複が消えている";
        echo PHP_EOL;
        ?>


        <h1>array_map()の利用</h1>
        <pre>
        <?php
        function make_full_name(string $family, string $personal){
            return "$family $personal";
        }
        var_dump($family);
        echo PHP_EOL;
        var_dump($personal);
        echo PHP_EOL;
        ?>
        </pre>
        
        <h2>array_mapで関数利用して配列の連結</h2>
        <?php
        $fullname_lis = array_map('make_full_name', $family, $personal);
        foreach($fullname_lis as $fullname):
            echo "<p>{$fullname}</p>";
        endforeach;
        ?>
    </div>
    <br><br>
    <br><br>
    <br><br>
</body>
</html>


PHPの配列はオブジェクトではないので、代入するだけで複製できる！
<!-- 配列 -->
$配列名 = [要素1,要素2,...];
もしくは
$配列名 = array(要素1,要素2,...);

<!-- 配列への要素追加 -->
$配列名[] = 要素;
配列の最後に要素を追加。index指定しても追加できる。

<!-- 連想配列 -->
$配列名 = ['key1'=>要素1, 'key2'=>要素2,...];

<!-- 連想配列の要素追加 -->
$配列名['key'] = 要素;

<!-- explode, implode -->
配列操作の優秀な関数
explode(文字列,"、") ・・・左の例では文字列を”、”で区切って配列に変換
implode("、", 配列)・・・左の例は配列の要素を"、"で区切った文字列に変換

<!-- 配列の定数化 -->
配列はdefine("配列名", [要素1,要素2,要素3])で定数化でき、読み取り専用になり値の変更ができなくなる。

<!-- 配列の要素削除 -->
array_splice($配列名, 開始インデックス, 削除個数);
連想配列も同じ

<!-- 配列の先頭、末尾の値取り出し -->
先頭要素（値を返して消える）
array_shift(&$配列名);

末尾(値を返して消える)
array_pop(&%配列名);

<!-- 配列要素の置き換えと連結 -->
置き換え
array_splice(&$置き換え配列, 開始インデックス, 置き換え個数, 挿入配列);

連結
array_merge(配列1,配列2,...);
連想配列の場合はkeyが同じ場合は、後から連結を指定した内容に置き換わる。

array_merge_recursive(配列1,配列2,...);
array_mergeと同じだが、連想配列を連結るする時に同じkeyの要素は多重配列として保持される。(一つのkeyに複数の要素)

<!-- 二つの配列から連想配列を作成 -->
array_combine(keys, values);

<!-- 重複を取り除く -->
array_unique();

<!-- スライスは関数 -->
array_slice(配列, 開始, 個数);

<!-- foreach() -->
配列
foreach($配列 as $変数){$変数を使った繰り返し処理}

連想配列
foreach($連想配列 as $key => $value){keyとvalueを使った処理}

<!-- 配列を変数へ展開 -->
list($変数1, $変数2, ...) = $配列;

<!-- 配列のソート -->
配列昇順
sort(配列);

配列降順
rsort(配列);

連想配列昇順
asort();

連想配列降順
arsort();
値でソートされてkeyとvalueの関係は崩れない。

ランダムに並び替え
shrffle();

逆順
array_reverse();

<!-- in -->
in_array(値, 配列);

<!-- 検索値のインデックスを返す -->
array_search(値, 配列);

<!-- 配列の要素を引数とした関数の結果を返す -->
array_map(関数, 配列1, 配列2, ...);
第二引数からは関数に渡したい引数

