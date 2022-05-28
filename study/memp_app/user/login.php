<?php
//--------------------- session ------------------------
session_start();

// sessionデータの受取
if(isset($_SESSION['login_id'])) {
    $login_id = $_SESSION['login_id'];
}else {
    $login_id = '';
}
if(isset($_SESSION['login_pass'])) {
    $login_pass = $_SESSION['login_pass'];
}else {
    $login_pass = '';
}
$error_msg = '';
if(isset($_SESSION['login_error'])) {
    $error_msg = $_SESSION['login_error'];
}
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
    <title>ログイン画面</title>
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
    <div class="bg-light border rounded p-5" style="min-width:50vw;">
        <h3 class="text-center">MEMOアプリ</h3>
        <h1 class="text-center"><img src="../images/user_icon.png" width="100" height="100" alt="ログイン"/></h1>
        <form method="POST" action="login_check.php" class="w-50 m-auto">
            <div class="mb-3">
                <input type="text" name="login_id" class="form-control" placeholder="ユーザーID" required autofocus value=<?= $login_id; ?>>
            </div>
            <div class="mb-3">
                <input type="password" name="login_pass" class="form-control" placeholder="パスワード" required autofocus value=<?= $login_pass; ?>>
            </div>
            <p class="text-danger text-center"><?= $error_msg; ?></p>
            <p class="text-center"><button class="btn btn-primary" style="width: 100px;" type="submit">ログイン</button></p>
        </form>
        <p class="text-center mt-5"><a href="user_create.php">新規ユーザー登録はこちら</a></p>
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