<?php
// var_dump($_GET);
// exit();
// 関数ファイルの読み込み
include('functions.php');//functions.phpに接続


// getで送信されたidを取得
$id=$_GET['id'];

//DB接続します
$pdo=db_conn();//functions.phpに全部入力したからこれでOK

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM user_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    // var_dump($id);
    // fetch()で1レコードを取得して$rsに入れる
    // $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
    // var_dump()で見てみよう
}
?>


    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <title>公園共有APP</title>
        <link href="../css/main.css" rel="stylesheet">
        <style>
            <style>div {
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

        <form action="user_update.php" method="post">
            <!-- postでおくる -->
            <label for="nn">名前</label>
            <input type="text" id="nn" name="nn" value="<?=$rs['nn']?>">
            <br>
            <label for="lid">ID</label>
            <input type="text" id="lid" name="lid" value="<?=$rs['lid']?>">
            <br>
            <label for="lpw">PW</label>
            <input type="password" id="lpw" name="lpw" value="<?=$rs['lpw']?>">
            <br>
            <label for="kanri_flg">管理</label>
            <input class="radio_box" type="radio" id="kanri_flg" name="kanri_flg" value="0">一般
            <input class="radio_box" type="radio" id="kanri_flg" name="kanri_flg" value="1">管理者
            <br>
            <label for="life_flg">アクティブ</label>
            <input class="radio_box" type="radio" id="life_flg" name="life_flg" value="0">アクティブ
            <input class="radio_box" type="radio" id="life_flg" name="life_flg" value="1">非アクティブ
            <br>
            <button type="submit" class="btn-blue">送信</button>


            <!-- idは変えたくない = ユーザーから見えないようにする-->
            <input type="hidden" name="id" value="<?=$rs['id']?>">
        </form>

    </body>

    </html>