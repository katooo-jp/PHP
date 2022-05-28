<?php
//--------------------- session ------------------------
session_start();
// 未ログインはログイン画面へリダイレクト
if(!isset($_SESSION['login'])) {header('location: ../user/login.php');exit();}

// sessionデータあれば各変数に値を代入
if(isset($_SESSION['title'])){
    $title = $_SESSION['title'];
}else {
    $title = '';
}
if(isset($_SESSION['content'])){
    $content = $_SESSION['content'];
}else {
    $content = '';
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
    <title>新規メモ作成画面</title>
</head>
<body>
    <!-- main -->
    <main>
        <section class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-5">
                    <h3 class="m-3 text-center">新規メモ作成</h3>
                    <form method="POST" action="confirm.php">
                        <div class="mb-3 ">
                            <input type="text" class="form-control" placeholder="タイトル" name="title" value="<?= $title; ?>">
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" placeholder="内容" rows="5" name="content"><?= $content; ?></textarea>
                        </div>
                        <button type="submit" style="width: 100px;" class="btn btn-primary m-auto d-block">登録</button>
                    </form>
                    <a href="index.php" style="width: 100px;" class="btn btn-outline-secondary m-auto mt-5 d-block" tabindex="-1" role="button" aria-disabled="true">戻る</a>
                </div>
            </div>
        </section>
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