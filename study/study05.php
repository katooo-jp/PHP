<?php
require_once("Human.php");

trait sing {
    function sing() {
        echo "みんなま〜るくたけもとピアノ〜♪";
    }
}

class Police extends Human {
    use sing;
    function __construct($name, $age, public string $rank){
        parent::__construct($name, $age);
    }

    // オーバーライド
    function introduce(){
        echo parent::introduce(),"階級は{$this->rank}です",PHP_EOL;
    }
}

$tanaka = new Police("田中",23,"巡査部長");
$suzuki = new Police("鈴木",35,"警察署長");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>study05</title>
</head>
<body>
    <div>
    <h1>田中の自己紹介</h1>
    <p><?php $tanaka->introduce();?></p>
    <h1>鈴木の自己紹介</h1>
    <p><?php $suzuki->introduce();?></p>
    <p><?php $suzuki->sing();?></p>
    </div>
    <br><br>
    <br><br>
    <br><br>
</body>
</html>

<!-- クラス生成 -->
class クラス名 {
    プロパティ定義
    メソッド定義
}

<!-- アクセス修飾子 -->
public  どこからでもアクセスできる
protected 定義したクラスと子クラスからアクセス可
private 定義したクラス内のみアクセス可

<!-- コンストラクタ -->
class クラス名 {
    public 型 $プロパティ名1;
    public 型 $プロパティ名2;
    
    function __construct(型 $変数1 = 初期値, 型 $変数2){
        $this->プロパティ名1 = $変数1;
        $this->プロパティ名2 = $変数2;
    }
}

<!-- プロパティの宣言の省略形 -->
class クラス名 {    
    function __construct(public 型 $変数1, public 型 $変数2){}
    引数の値がそのままプロパティに代入

    function 関数名(){
        echo $this->変数1;
    }
}

<!-- メソッドの実行 -->
$インスタンス名->メソッド名();

<!-- インスタンス生成 -->
$インスタンス名 = new クラス名;

<!-- クラスの継承 -->
class 子クラス extends 親クラス {
}

<!-- トレイト -->
PHPにはトレイトというインクルードに似た仕組みがある。自分のクラスで定義しているかのように利用できる。
クラスは親クラスを一つしか継承できないが、トレイトは複数できるメリット
trait トレイト名{
    トレイトのプロパティ
    トレイトのメソッド
}

<!-- トレイトの使い方 -->
class クラス名 {
    use トレイト名, トレイト名, ...;
}

<!-- インターフェース -->
インターフェースを採用したクラスではインターフェースを見れば、そのクラスで確実に実行できるメソッドと呼び出し方が確認できる。
<!-- インターフェースの定義 -->
interface インターフェース名{
    function 関数名();
}
<!-- インターフェースのクラスへの実装 -->
class クラス名 implements インターフェース名 {

}

<!-- 抽象クラス、抽象メソッド -->
クラス名とメソッド名にabstractをつけて定義したもの。利用は必ず継承してから行う。
PHPの抽象メソッドには他の言語と違って、初期機能を設定できない。
<!-- 抽象クラスの実装 -->
abstract class 抽象クラス名{
    abstract function 抽象メソッド名();
}
<!-- 抽象メソッドの実装 -->
class クラス名 extends 抽象クラス {
    function 抽象メソッド名(){
        オーバーライドして機能を定義する。
    };
}

<!-- 別のファイルにクラスを定義して読み込む -->
require_once("クラス.php");