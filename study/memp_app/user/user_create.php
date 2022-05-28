<?php
//--------------------- session ------------------------
session_start();
// sessionデータあれば各変数に値を代入
if(isset($_SESSION['create_id'])){
    $create_id = $_SESSION['create_id'];
} else {
    $create_id = '';
}
if(isset($_SESSION['create_pass'])){
    $create_pass = $_SESSION['create_pass'];
} else {
    $create_pass = '';
}
if(isset($_SESSION['create_pass2'])){
    $create_pass2 = $_SESSION['create_pass2'];
} else {
    $create_pass2 = '';
}
if(isset($_SESSION['create_name'])){
    $create_name = $_SESSION['create_name'];
} else {
    $create_name = '';
}
if(isset($_SESSION['create_sex'])){
    $create_sex = $_SESSION['create_sex'];
} else {
    $create_sex = '';
}
if(isset($_SESSION['create_year'])){
    $create_year = $_SESSION['create_year'];
} else {
    $create_year = '';
}
if(isset($_SESSION['create_month'])){
    $create_month = $_SESSION['create_month'];
} else {
    $create_month = '';
}
if(isset($_SESSION['create_day'])){
    $create_day = $_SESSION['create_day'];
} else {
    $create_day = '';
}
if(isset($_SESSION['create_hobby'])){
    $create_hobby = $_SESSION['create_hobby'];
} else {
    $create_hobby = '';
}
if(isset($_SESSION['create_intro'])){
    $create_intro = $_SESSION['create_intro'];
} else {
    $create_intro = '';
}


// POSTでないならセッションデータの初期化
if($_SERVER["REQUEST_METHOD"] != "POST") {
    session_destroy();
}

// html動的関数
function checked($value, $value2) {
    $result = '';
    if($value == $value2):
        $result = 'checked=checked';
    endif;
    return $result;
}
function selected($value, $value2) {
    $result = '';
    if($value == $value2):
        $result = 'selected';
    endif;
    return $result;
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
    <title>ユーザー登録画面</title>
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
    <div class="bg-light border rounded p-5 mt-5 mb-5" style="min-height: 80vh; min-width:50vw;">
        <h3 class="text-center">新規ユーザー登録画面</h3>
        <h1 class="text-center"><img src="../images/user_icon.png" width="100" height="100" alt="ログイン"/></h1>
        <!-- ----------------- create user form --------------------- -->
        <form method="POST" action="user_create_confirm.php" class="w-75 m-auto">
            <!-- ユーザーID -->
            <div class="mb-3">
                <label for="createId" class="form-label">ユーザーID</label>
                <input type="text" name="create_id" class="form-control" id="createId" placeholder="半角英数字8文字以上16文字以内で作成してください。" required autofocus value=<?= $create_id; ?>>
            </div>
            <!-- パスワード -->
            <div class="mb-3">
                <label for="createPass" class="form-label">パスワード</label>
                <input type="password" name="create_pass" class="form-control" id="createPass" placeholder="半角英数字8文字以上16文字以内で作成してください。" required autofocus value=<?= $create_pass; ?>>
            </div>
            <div class="mb-3">
                <label for="createPass2" class="form-label">パスワード確認用</label>
                <input type="password" name="create_pass2" class="form-control" id="createPass2" placeholder="パスワードを再入力してください。" required autofocus value=<?= $create_pass2; ?>>
            </div>
            <!-- 名前 -->
            <div class="mb-3">
                <label for="createName" class="form-label">名前</label>
                <input type="text" name="create_name" class="form-control" id="createName" placeholder="名前" required autofocus value=<?= $create_name; ?>>
            </div>
            <!-- 性別 -->
            <div class="mb-3">
                <p>性別</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="create_sex" value="男" id="createSexMen" <?= checked("男",$create_sex); ?>>
                    <label class="form-check-label" for="createSexMen">男</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="create_sex" value="女" id="createSexWomen" <?= checked("女",$create_sex); ?>>
                    <label class="form-check-label" for="createSexWomen">女</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="create_sex" value="未回答" id="createSexNone" <?= checked("未回答",$create_sex); ?>>
                    <label class="form-check-label" for="createSexNone">未回答</label>
                </div>
            </div>
            <!-- 誕生日 -->
            <div class="mb-3">
                <label for="createBirth" class="form-label">誕生日</label>
                <div class="row">
                    <div class="col">
                        <select class="form-select" name="create_year" aria-label="createBirth">
                            <option selected>----</option>
                            <?php $year = 1950;
                            while($year < 2025):?>
                            <option value=<?= $year; ?> <?= selected($year, $create_year); ?>><?= $year ?></option>
                            <?php $year++; endwhile; ?>
                        </select>
                    </div>
                    <div class="col-1 d-flex align-items-center fs-5"><span>年</span></div>
                    <div class="col">
                        <select class="form-select" name="create_month" aria-label="createBirth">
                            <option selected>----</option>
                            <?php $month = 1;
                            while($month < 13):?>
                            <option value=<?= $month; ?> <?= selected($month, $create_month); ?>><?= $month ?></option>
                            <?php $month++; endwhile; ?>
                        </select>
                    </div>
                    <div class="col-1 d-flex align-items-center fs-5">月</div>
                    <div class="col">
                        <select class="form-select" name="create_day" aria-label="createBirth">
                            <option selected>----</option>
                            <?php $day = 1;
                            while($day < 32):?>
                            <option value=<?= $day; ?> <?= selected($day, $create_day); ?>><?= $day ?></option>
                            <?php $day++; endwhile; ?>
                        </select>
                    </div>
                    <div class="col-1 d-flex align-items-center fs-5">日</div>
                </div>
                
            </div>
            <!-- 趣味 -->
            <div class="mb-3">
                <label for="createHobby" class="form-label">趣味</label>
                <input type="text" name="create_hobby" class="form-control" id="createHobby" placeholder="20文字以内で入力してください" required autofocus value=<?= $create_hobby; ?>>
            </div>
            <!-- 自己紹介 -->
            <div class="mb-3">
                <label for="createIntro" class="form-label">自己紹介</label>
                <textarea name="create_intro" class="form-control" rows="5" id="createIntro" placeholder="200文字以内で入力してください" required autofocus><?= $create_intro; ?></textarea>
            </div>
            <p class="text-center"><button class="btn btn-primary" style="width: 100px;" type="submit">登録</button></p>
        </form>
        <!-- -------------------------------------------------------------- -->
        <p class="text-center mt-5"><a href="login.php">すでにアカウントを持っている方ははこちら</a></p>
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