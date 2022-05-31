<?php

// -------- session ---------
session_start();
if(isset($_SESSION['create_id']) and isset($_SESSION['create_pass']) and isset($_SESSION['create_name'])
and isset($_SESSION['create_sex']) and isset($_SESSION['create_year']) and isset($_SESSION['create_month']) 
and isset($_SESSION['create_day']) and isset($_SESSION['create_hobby']) and isset($_SESSION['create_intro'])) {
    $create_id = $_SESSION['create_id'];
    $create_pass = $_SESSION['create_pass'];
    $create_name = $_SESSION['create_name'];
    $create_sex = $_SESSION['create_sex'];
    $create_date = $_SESSION['create_year'].'/'.$_SESSION['create_month'].'/'.$_SESSION['create_day'];
    $create_hobby = $_SESSION['create_hobby'];
    $create_intro = $_SESSION['create_intro'];
}else {
    header('location: ../memo/index.php');
    exit();
}
session_destroy();
// --------------------------

// ---------------------- DB -------------------------
$user = 'root';
$password = 'root';
$dbName = 'kato_db';
$host = 'localhost:8889';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "insert into user(user_id,password,name,sex,birthday,hobby,introduce) values (?,?,?,?,?,?,?)";
    $stm = $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $create_id, PDO::PARAM_STR);
    $stm->bindValue(2, $create_pass, PDO::PARAM_STR);
    $stm->bindValue(3, $create_name, PDO::PARAM_STR);
    $stm->bindValue(4, $create_sex, PDO::PARAM_STR);
    $stm->bindValue(5, $create_date, PDO::PARAM_STR);
    $stm->bindValue(6, $create_hobby, PDO::PARAM_STR);
    $stm->bindValue(7, $create_intro, PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchALL(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
    $err =  '<span class="error">エラーがありました。</span><br>';
    $err .= $e->getMessage();
    exit($err);
}
// -------------------------------------------------------------------

// -----------------------------------------------------
?>

<!doctype html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ユーザー登録完了画面</title>
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
    <div class="bg-light border rounded p-5">
        <h3 class="text-center mb-3">ユーザー登録完了</h3>
        <p>ユーザー登録が完了しました。</p>
        <p><a href="mypage.php" style="width: 150px;" class="btn btn-outline-secondary m-auto mt-5 d-block" tabindex="-1" role="button" aria-disabled="true">マイページへ</a></p>
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