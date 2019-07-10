<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();
$menu = menu();

//2. DB接続します(エラー処理追加)
$pdo=db_conn();//functions.phpに全部入力したからこれでOK

?>


    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <title>PARK APP</title>
        <link href="../css/main.css" rel="stylesheet">

        <style>
            div {
                padding: 10px;
                font-size: 12px;
            }
        </style>
    </head>

    <body>

        <div class="header_box">
            <img src="../img/park.png" alt="" width="60px">
            <?php if ($_SESSION['kanri_flg'] == '1') : ?>
            <a class="btn" href="select.php">　公園一覧　</a>
            <a class="btn" href="index.php">　公園登録　</a>
            <a class="btn" href="user_select.php">　会員一覧　</a>
            <a class="btn" href="user_index.php">　会員登録　</a>

            <?php else: ?>
            <a class="btn" href="user_select.php">　会員一覧　</a>
            <a class="btn" href="user_index.php">　会員登録　</a>
            <?php endif; ?>
            <a class="btn" href="logout.php">　ログアウト　</a>
        </div>

        <form action="user_insert.php" method="post">

            <div class="cp_iptxt">
                <label for="nn">ニックネーム</label>
                <input for="nn" type="text" id="nn" name="nn" value="">
            </div>

            <div class="cp_iptxt">
                <label for="lid">ログインID</label>
                <input for="lid" type="text" id="lid" name="lid">
            </div>

            <div class="cp_iptxt">
                <label for="lpw">ログインPW</label>
                <input for="lpw" type="password" id="lpw" name="lpw">
            </div>

            <div class="cp_iptxt">
                <label for="kanri_flg">管理</label>
                <br>
                <input class="radio_box" type="radio" id="kanri_flg" name="kanri_flg" value="0">一般
                <input class="radio_box" type="radio" id="kanri_flg" name="kanri_flg" value="1">管理者
            </div>

            <div class="cp_iptxt">
                <label for="life_flg">アクティブ</label>
                <br>
                <input class="radio_box" type="radio" id="life_flg" name="life_flg" value="0">アクティブ
                <input class="radio_box" type="radio" id="life_flg" name="life_flg" value="1">非アクティブ
            </div>

            <div>
                <button type="submit" class="btn-blue">送信</button>
            </div>
        </form>




    </body>

    </html>