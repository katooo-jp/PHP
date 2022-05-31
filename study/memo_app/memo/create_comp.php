<?php
// -------- session ---------
session_start();
// 未ログインはログイン画面へリダイレクト
if(!isset($_SESSION['login'])) {header('location: ../user/login.php');exit();}


if(isset($_SESSION['title']) and isset($_SESSION['content'])) {
    $title = $_SESSION['title'];
    $content = $_SESSION['content'];
}else {
    header('location: index.php');
    exit();
}

// --------------------------

// ーーーーーーー　DB　ーーーーーーーーーー
$user = 'root';
$password = 'root';
$dbName = 'kato_db';
$host = 'localhost:8889';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "insert into memo(title,content,user_id) values (?,?,?)";
    $stm = $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $title, PDO::PARAM_STR);
    $stm->bindValue(2, $content, PDO::PARAM_STR);
    $stm->bindValue(3, $_SESSION['login'], PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchALL(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
    $err =  '<span class="error">エラーがありました。</span><br>';
    $err .= $e->getMessage();
    exit($err);
}
// -------------------------------------------------------------------

// 登録後処理
unset($title);
unset($content);
unset($_SESSION['title']);
unset($_SESSION['content']);
?>

<!doctype html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>メモ作成完了画面</title>
</head>
<style>
html {
	height: 100%;
	margin: 0 auto;
	padding: 0;
	display: table;
}
body {
	min-height: 100%;
	margin: 0 auto;
	padding: 0;
	display: table-cell;
	vertical-align: middle;
}
</style>
<body>
<div class="bg-light border rounded p-5" style="min-width: 30vw;">
        <h3 class="text-center mb-3">メモ作成完了</h3>
        <p class="text-center">登録が完了しました。</p>
        <p><a href="index.php" style="width: 100px;" class="btn btn-outline-secondary m-auto mt-5 d-block" tabindex="-1" role="button" aria-disabled="true">戻る</a></p>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>