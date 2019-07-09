<?php
// セッションのスタート
session_start();

//functions.phpに接続
include('functions.php');

// ログイン状態のチェック
chk_ssid();
$menu = menu();

//1. DB接続
$pdo=db_conn();//functions.phpに全部入力したからこれでOK


//2. データ表示SQL作成
$sql = 'SELECT * FROM user_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示
$view='';
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $view .='<div class="kakomi">';
        
            $view .= '<P>'."ニックネーム：".$result['nn'].'</P>';//ニックネームをhtmlのviewで表示
            $view .= '<P>'."ログインID：".$result['lid'].'</P>';
            $view .= '<P>'."ログインPW：".$result['lpw'].'</P>';

            $view .= '<a href="user_detail.php?id='.$result[id].'" class="btn">　修正　</a>'; //修正ボタン
            $view .= '<a href="user_delete.php?id='.$result[id].'" class="btn">　消去　</a>';//消去ボタン
        
        $view .='</div>';
        
    }
}
?>



    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <title>公園共有APP</title>
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
            <a class="top_btn">公園にいこう</a>
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


        <div>
            <ul class="list-group">
                <?=$view?>
            </ul>
        </div>


    </body>

    </html>