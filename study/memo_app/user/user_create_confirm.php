<?php
require_once('../memo/db_connect.php');

// POSTでないならホーム画面へ
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location: ../memo/index.php');
    exit();
}

$errors = [];
// -----------------------　DB ---------------------------
// 使用済みユーザーIDでないか判定
if(isset($_POST['create_id'])) {
    $idlen =  mb_strlen($_POST['create_id']);
    if($_POST['create_id'] != '' and $idlen <= 16 and $idlen >= 8){
            $sql = "select user_id from user";
            $stm = $stm = $pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchALL(PDO::FETCH_ASSOC);
        if(in_array($_POST['create_id'], array_column( $result, 'user_id'))){
            $errors[] = 'すでにこのユーザーIDは使われています。';
        }
    }else {
        $errors[] = 'ユーザーIDを8文字以上16文字以内で入力してください。';
    }
}

// -----------------------------------------------------

//--------------------- session ------------------------
session_start();

// POSTデータの$_SESSION保存
// FORMバリデーション
if(isset($_POST['create_id'])) {
    if($_POST['create_id'] != ''):
        $_SESSION['create_id'] = $_POST['create_id'];
    else:
        $errors[] = 'ユーザーIDが未入力です';
    endif;
}

if(isset($_POST['create_pass'])) {
    if(mb_strlen($_POST['create_pass']) <= 16 and mb_strlen($_POST['create_pass']) >= 8):
        $_SESSION['create_pass'] = $_POST['create_pass'];
    else:
        $errors[] = 'パスワードを8文字以上16文字以内で入力してください。';
    endif;
}
if(isset($_POST['create_pass2'])) {
    if($_POST['create_pass2'] != ''):
        $_SESSION['create_pass2'] = $_POST['create_pass2'];
    else:
        $errors[] = '確認用のパスワードが未入力です';
    endif;
}
if(isset($_POST['create_pass']) and isset($_POST['create_pass2'])) {
    // パスワードと確認用パスワードの一致確認   
    if(isset($_POST['create_pass'])) {
        if($_POST['create_pass'] != $_POST['create_pass2']) {
            $errors[] = 'パスワードが一致しません';
        }
    }
}
if(isset($_POST['create_name'])) {
    if($_POST['create_name'] != ''):
        $_SESSION['create_name'] = $_POST['create_name'];
    else:
        $errors[] = '名前が未入力です';
    endif;
}
if(isset($_POST['create_sex'])) {
    $_SESSION['create_sex'] = $_POST['create_sex'];
}else {
    $errors[] = '性別が選択されていません。';
}
if(isset($_POST['create_year']) and isset($_POST['create_month']) and isset($_POST['create_day'])
and $_POST['create_year'] != '----' and $_POST['create_month'] != '----' and $_POST['create_day'] != '----') {
    $_SESSION['create_year'] = $_POST['create_year'];
    $_SESSION['create_month'] = $_POST['create_month'];
    $_SESSION['create_day'] = $_POST['create_day'];
}else {
    $errors[] = '誕生日が未入力です';
}
if(isset($_POST['create_hobby'])) {
    if($_POST['create_hobby'] != ''):
        $_SESSION['create_hobby'] = $_POST['create_hobby'];
    else:
        $errors[] = '趣味が未入力です';
    endif;
}
if(isset($_POST['create_intro'])) {
    if(mb_strlen($_POST['create_intro']) <= 200):
        $_SESSION['create_intro'] = $_POST['create_intro'];
    else:
        $errors[] = '自己紹介は200文字以内で入力してください';
    endif;
}else {
    $errors[] = '自己紹介が未入力です';
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
    <title>入力確認画面</title>
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
    <?php if(count($errors) == 0):?>
    <!-- エラーなし表示 -->
    <div class="bg-light border rounded p-5 m-5" style="min-height: 80vh; min-width:50vw; max-width:50vw;">
        <h3 class="text-center">入力確認</h3>
        <p class="text-danger text-center">登録内容に間違えがないか確認して登録をしてください</p>
        <table class="table table-borderless mt-5 fs-5">
            <tr>
                <th class="text-end" style="width: 30%;">ユーザーID：</th>
                <td><?= $_POST['create_id']; ?></td>
            </tr>
            <tr>
                <th class="text-end">パスワード：</th>
                <td><?= $_POST['create_pass']; ?></td>
            </tr>
            <tr>
                <th class="text-end">性別：</th>
                <td><?= $_POST['create_sex']; ?></td>
            </tr>
            <tr>
                <th class="text-end">誕生日：</th>
                <td><?= $_POST['create_year']; ?>年<?= $_POST['create_month']; ?>月<?= $_POST['create_day']; ?>日</td>
            </tr>
            <tr>
                <th class="text-end">趣味：</th>
                <td><?= $_POST['create_hobby']; ?></td>
            </tr>
            <tr>
                <th class="text-end">自己紹介：</th>
                <td><?= $_POST['create_intro']; ?></td>
            </tr>
        </table>
        <p><a href="user_create.php" style="width: 100px;" class="btn btn-outline-secondary m-auto mt-5 d-block" tabindex="-1" role="button" aria-disabled="true">戻る</a></p>
        <p><a href="user_create_comp.php" style="width: 100px;" class="btn btn-outline-secondary m-auto mt-3 d-block" tabindex="-1" role="button" aria-disabled="true">登録</a></p>
    </div>
    <?php else:?>
    <!-- エラーあり表示 -->
    <div class="bg-light border rounded p-5">
        <h3 class="text-center mb-3 text-danger">入力エラー</h3>
        <ul>
            <?php foreach($errors as $error): ?>
            <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
        <p><a href="user_create.php" style="width: 100px;" class="btn btn-outline-secondary m-auto mt-5 d-block" tabindex="-1" role="button" aria-disabled="true">戻る</a></p>
    </div>
    <?php endif; ?>


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