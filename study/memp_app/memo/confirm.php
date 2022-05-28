<?php
//--------------------- session ------------------------
session_start();

// 未ログインはログイン画面へリダイレクト
if(!isset($_SESSION['login'])) {header('location: ../user/login.php');exit();}


$errors = [];

// POSTデータあれば$_SESSIONに値を代入
if(isset($_POST['title'])) {
    if($_POST['title'] != ''):
        $_SESSION['title'] = $_POST['title'];
    else:
        $errors[] = 'タイトルが未入力です';
    endif;
    if(mb_strlen($_POST['title']) > 30):
        $errors[] = 'タイトルは20文字以内で入力してください';
    endif;
}
if(isset($_POST['content'])) {
    if($_POST['content'] != ''):
        $_SESSION['content'] = $_POST['content'];
    else:
        $errors[] = '内容が未入力です';
    endif;
    if(mb_strlen($_POST['content']) > 200):
        $errors[] = '内容は200文字以内で入力してください';
    endif;
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
    <!-- main -->
    <div class="container bg-light p-5 border rounded " style="min-width: 50vw; max-width: 50vw;">
        <div class="row">
            <?php if(count($errors) > 0): ?>
                <h3 class="text-center mt-3 text-danger">エラー</h3>
                <?php foreach($errors as $error):?>
                <p class="fs-5 text-center"><?= $error; ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <h3 class="text-center mt-3">入力確認画面</h3>
                <table class="table table-borderless bg-light mt-5 fs-5">
                    <tr>
                        <th class="text-end" style="width: 30%;">タイトル：</th>
                        <td><?= $_POST['title']; ?></td>
                    </tr>
                    <tr>
                        <th class="text-end">内容：</th>
                        <td><?= $_POST['content']; ?></td>
                    </tr>
                </table>
                <p class="text-center"><a href="create_comp.php" style="width: 100px;" class="btn btn-primary mt-3 mb-3 m-auto d-block" tabindex="-1" role="button" aria-disabled="true">登録</a></p>
            <?php endif; ?>
            <p class="text-center"><a href="create.php" style="width: 100px;" class="btn btn-outline-secondary m-auto d-block" tabindex="-1" role="button" aria-disabled="true">戻る</a></p>
        </div>
    </main>


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