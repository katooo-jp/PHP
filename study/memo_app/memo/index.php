<?php
//--------------------- session ------------------------
session_start();
// 未ログインはログイン画面へリダイレクト
if(!isset($_SESSION['login'])) {header('location: ../user/login.php');exit();}

// -----------------------------------------------------

// -----------------------　DB ---------------------------
$user = 'root';
$password = 'root';
$dbName = 'kato_db';
$host = 'localhost:8889';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // GET or POST
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        // GET処理
        $sql = "select * from memo where user_id=?";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(1, $_SESSION['login'], PDO::PARAM_STR);
    }else {
        // POST処理
        if($_POST['search'] == ''):
            header('location: index.php');
            exit();
        else:
            $search = $_POST['search'];
            $sql = "select * from memo where user_id=? and title like ? or content like ?";
            $stm = $stm = $pdo->prepare($sql);
            $stm->bindValue(1, $_SESSION['login'], PDO::PARAM_STR);
            $stm->bindValue(2, "%{$search}%", PDO::PARAM_STR);
            $stm->bindValue(3, "%{$search}%", PDO::PARAM_STR);
        endif;
    }
    $stm->execute();
    $result = $stm->fetchALL(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
    $err =  '<span class="error">エラーがありました。</span><br>';
    $err .= $e->getMessage();
    exit($err);
}
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
    <title>メモ</title>
</head>
<body>
    <!-- header -->
    <header class="py-3 mb-3 border-bottom">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
            <div class="dropdown">
            <a href="#" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle" id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg> -->
                <img class="bi me-2" width="40" height="32" src="../images/icon.png">
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownNavLink">
                <li><a class="dropdown-item" href="../user/mypage.php">マイページ</a></li>
                <li><a class="dropdown-item active" href="#" aria-current="page">メモ</a></li>
                <li><a class="dropdown-item" href="../user/logout_confirm.php">ログアウト</a></li>
            </ul>
            </div>

            <div>
            <form class="w-100 me-3" method="POST" action="">
                <div class="row">
                    <div class="col-10">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="search">
                    </div>
                    <div class="col">
                    <button type="submit" class="form-control btn btn-outline-secondary">検索</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </header>

    <!-- main -->
    <main>
        <section class="container"> 
            <!-- 新規作成ボタン -->
            <div class="row justify-content-center">
                <div class="col-1">
                    <a href="create.php"><img class="d-block m-auto" src="../images/plus.png" width="80" height="80" alt="create_memo"></a>
                </div>
            </div>

            <!-- メモカード表示 -->
            <div class="w-100 d-flex flex-wrap">
                <?php foreach($result as $row): ?>
                    <div class="card mt-3" style="height:300px; width: 24%; margin:0.5%;">
                    <div class="card-body">
                        <h5 class="card-title bg-light p-2 rounded" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['no']; ?>"><?= $row['title']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['no']; ?>"><?= $row['date']; ?></h6>
                        <!-- 表示文字数調整 -->
                        <?php
                        $content = $row['content'];
                        if(mb_strlen($content) > 80) {
                            $content = mb_substr($content, 0,79).'…';
                        }
                        ?>
                        <p class="card-text h-50 bg-light p-1 rounded" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['no']; ?>"><?= $content; ?></p>
                        <!-- 内容全表示モーダル -->
                        <div class="modal fade" id="viewModal<?= $row['no']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewModalLabel"><?= $row['title']; ?>
                                        <br><span class="fs-6"><?= $row['date']; ?></span></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?= $row['content']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <!-- 編集ボタン -->
                            <button type="button" class="btn btn-primary" style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#updateModal<?= $row['no']; ?>">編集</button>
                            <!-- 編集モーダル -->
                            <div class="modal fade" id="updateModal<?= $row['no']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel">メモ編集画面</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="update_comp.php" id="updateForm<?= $row['no']; ?>">
                                                <p>タイトル</p>
                                                <input type="text" class="w-100" name="update_title" value=<?= $row['title']; ?>>
                                                <p>内容</p>
                                                <textarea class="w-100" rows="7" name="update_content"><?= $row['content']; ?></textarea>
                                                <input type="hidden" name="update_no" value=<?= $row['no']; ?>>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                                            <button type="submit" form="updateForm<?= $row['no']; ?>" class="btn btn-primary">登録</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 削除ボタン -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['no']; ?>">削除</button>
                            <!-- 削除モーダル -->
                            <div class="modal fade" id="deleteModal<?= $row['no']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">削除確認</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>本当に削除してもよろしいですか？</p>
                                            <p>日付：<?= $row['date']; ?></p>
                                            <p>タイトル：<?= $row['title']; ?></p>
                                            <h6>内容：</h6>
                                            <p><?= $row['content']; ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                                            <form method="POST" action="delete_comp.php">
                                                <input type="hidden" name="delete_no" value=<?= $row['no']; ?>>
                                                <button type="submit" class="btn btn-danger">削除</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php endforeach; ?>
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