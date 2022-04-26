<?php
if($_SERVER["REQUEST_METHOD"] != "POST"):
    $count = 0;
else:
    $count = $_POST["count"];
    $user_hand = $_POST["user_hand"];
    $post_com_hand = $_POST["post_com_hand"];
    $result = ["あいこ","あなたの負け","あなたの勝ち"];

    function judge($user, $com){
        global $result, $count;
        $res_num = ($user - $com + 3) % 3;
        if ($res_num == 1 or $res_num == 0):
            $count = 0;
        elseif ($res_num == 2):
            $count += 1;
        endif;
        return $result[$res_num];
    }
    $result_msg = judge($user_hand, $post_com_hand);
endif;

function show_hand($num){
    if ($num == 0):
        $hand = "ぐー";
    elseif ($num == 1):
        $hand = "ちょき";
    else:
        $hand = "ぱー";
    endif;
    return $hand;
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercise01_1</title>
</head>
<body>
    <div>
        <h1>ジャンケンゲーム</h1>
        <!-- user_section -->
        <section>
            <h3>ユーザーの手を決めてください</h3>
            <p>0:ぐー　1:ちょき　2:ぱー<br>
            <span>※半角で入力してください</span></p>
            <form method="POST" action="">
                <input type="number" name="user_hand" min=0, max=2, value=0>
                <input type="hidden" name="post_com_hand" value="<?= rand(0,2); ?>">
                <input type="hidden" name="count" value="<?= $count; ?>">
                <input type="submit" value="決定">
            </form>
            <p><a href="">リセット</a></p>
        </section>

        <!-- 画面切り替え GET or POST -->
        <?php if($_SERVER["REQUEST_METHOD"] != "POST"):?>
        <!-- GET -->
            <h2>目指せ１０連勝！！！</h2>

        <?php elseif ($_POST["user_hand"] >= 0 and $_POST["user_hand"] <= 2):?>
        <!-- POST -->
        <!-- result_section -->
        <section>
            <h2>現在<?= $count; ?>連勝</h2>
            <p>あなたの手は"<?= show_hand($user_hand); ?>"です。</p>
            <p>comの手は"<?= show_hand($post_com_hand); ?>"です。</p>
            <p><?= $result_msg; ?></p>
        </section>
        <?php else:?>
        <h2>0~2の数字を半角で入力してください</h2>
        <?php endif; ?>
    </div>
</body>
</html>
