<?php
require_once('../memo/db_connect.php');

//--------------------- session ------------------------
session_start();
// 未ログインはログイン画面へリダイレクト
if(!isset($_SESSION['login'])) {header('location: login.php');exit();}

// -----------------------------------------------------

// -----------------------　DB ---------------------------
$sql = "select * from user where user_id=?";
$stm = $stm = $pdo->prepare($sql);
$stm->bindValue(1, $_SESSION['login'], PDO::PARAM_STR);

$stm->execute();
$result = $stm->fetchALL(PDO::FETCH_ASSOC);
// -------------------------------------------------------------------
?>

<!doctype html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>マイページ</title>
</head>
<style>
html {
	height: 100%;
    width: 100%;
	margin: 0 auto;
	padding: 0;
	display: table;
}
body .main {
	min-height: 100%;
	margin: 0 auto;
	padding: 0;
	vertical-align: middle;
}
</style>
<body>
    <!-- header -->
    <header class="py-3 mb-3 border-bottom">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
            <div class="dropdown">
            <a href="#" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle" id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="bi me-2" width="40" height="32" src="../images/icon.png">
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownNavLink">
                <li><a class="dropdown-item active" href="#" aria-current="page">マイページ</a></li>
                <li><a class="dropdown-item" href="../memo/index.php">メモ</a></li>
                <li><a class="dropdown-item" href="logout_confirm.php">ログアウト</a></li>
            </ul>
            </div>
        </div>
    </header>
    <div class="main p-5" style="min-width:50vw; max-width:50vw;">
        <h3 class="text-center border-bottom p-2">マイプロフィール</h3>
        <table class="table table-borderless bg-light mt-5 fs-5">
            <tr>
                <th class="text-end" style="width: 30%;">ユーザーID：</th>
                <td><?= $result[0]['user_id']; ?></td>
            </tr>
            <tr>
                <th class="text-end">パスワード：</th>
                <td><?= $result[0]['password']; ?></td>
            </tr>
            <tr>
                <th class="text-end">性別：</th>
                <td><?= $result[0]['sex']; ?></td>
            </tr>
            <tr>
                <th class="text-end">誕生日：</th>
                <td><?= $result[0]['birthday']; ?></td>
            </tr>
            <tr>
                <th class="text-end">趣味：</th>
                <td><?= $result[0]['hobby']; ?></td>
            </tr>
            <tr>
                <th class="text-end">自己紹介：</th>
                <td><?= $result[0]['introduce']; ?></td>
            </tr>
        </table>
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