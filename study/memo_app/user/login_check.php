<?php
require_once('../memo/db_connect.php');
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location: mypage.php');
    exit();
}


//--------------------- session ------------------------
session_start();
// sessionデータの受取
if(isset($_POST['login_id']) and isset($_POST['login_pass'])) {
    $_SESSION['login_id'] = $_POST['login_id'];
    $_SESSION['login_pass'] = $_POST['login_pass'];
}else {
    header('location: login.php');
    exit();
}
// -----------------------------------------------------

// -----------------------　DB ---------------------------
$sql = "select user_id, password from user where user_id=?";
$stm = $stm = $pdo->prepare($sql);
$stm->bindValue(1, $_POST['login_id'], PDO::PARAM_STR);

$stm->execute();
$result = $stm->fetchALL(PDO::FETCH_ASSOC);
// -------------------------------------------------------------------

// ユーザー認証
if(count($result) == 0) {
    $_SESSION['login_error'] = '入力されたユーザーIDは存在しません';
    header('location: login.php');
    exit();
}
if($_POST['login_pass'] == $result[0]['password']) {
    $_SESSION['login'] = $result[0]['user_id'];
    header('location: mypage.php');
    exit();
}else {
    $_SESSION['login_error'] = 'ユーザーIDとパスワードが一致しません';
    header('location: login.php');
    exit();
}

?>
