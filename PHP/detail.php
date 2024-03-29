<?php
// セッションのスタート
session_start();

// 関数ファイルの読み込み
include('functions.php');//functions.phpに接続


// ログイン状態のチェック
chk_ssid();
$menu = menu();

// getで送信されたidを取得
$id=$_GET['id'];

//DB接続します
$pdo=db_conn();//functions.phpに全部入力したからこれでOK

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM 07_30_yonedatomoyo WHERE id=:id';
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

        <form method="post" action="update.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control" id="name" name="name" value="<?=$rs['name1']?>">
            </div>
            <div class="form-group">
                <label for="address">住所</label>
                <input type="text" class="form-control" id="address" name="address" value="<?=$rs['address1']?>">
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="<?=$rs['url']?>">
            </div>
            <div class="form-group">
                <label for="toilet">トイレ</label>
                <br>
                <input class="radio_box" type="radio" class="form-control" id="toilet" name="toilet" value="1">ある
                <input class="radio_box" type="radio" class="form-control" id="toilet" name="toilet" value="2">ない
            </div>
            <div class="form-group">
                <label for="toilet_comment">トイレ情報</label>
                <br>
                <textarea class="form-control" id="toilet_comment" rows="1" name="toilet_comment"><?=$rs['toilet_comment']?></textarea>
            </div>
            <div class="form-group">
                <label for="slide">すべりだい</label>
                <br>
                <input class="radio_box" type="radio" class="form-control" id="slide" name="slide" value="1">ある
                <input class="radio_box" type="radio" class="form-control" id="slide" name="slide" value="2">ない
            </div>
            <div class="form-group">
                <label for="sandbox">砂場</label>
                <br>
                <input class="radio_box" type="radio" class="form-control" id="sandbox" name="sandbox" value="1">ある
                <input class="radio_box" type="radio" class="form-control" id="sandbox" name="sandbox" value="2">ない
            </div>
            <div class="form-group">
                <label for="swing">ブランコ</label>
                <br>
                <input class="radio_box" type="radio" class="form-control" id="swing" name="swing" value="1">ある
                <input class="radio_box" type="radio" class="form-control" id="swing" name="swing" value="2">ない
            </div>
            <div class="form-group">
                <label for="ball">ボール遊び</label>
                <br>
                <input class="radio_box" type="radio" class="form-control" id="ball" name="ball" value="1">OK
                <input class="radio_box" type="radio" class="form-control" id="ball" name="ball" value="2">NG
            </div>
            <div class="form-group">
                <label for="drink">自動販売機</label>
                <br>
                <input class="radio_box" type="radio" class="form-control" id="drink" name="drink" value="1">ある
                <input class="radio_box" type="radio" class="form-control" id="drink" name="drink" value="2">ない
            </div>
            <div class="form-group">
                <label for="date">更新日</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="comment">コメント</label>
                <textarea class="form-control" id="comment" rows="3" name="comment"><?=$rs['comment']?></textarea>
            </div>

            <div class="form-group">
                <label for="date">写真アップ</label>
                <input type="file" class="form-control" id="date" name="upfile" accept="image/*" capture="camera">
            </div>

            <div class="form-group">
                <button type="submit" class="btn-blue">送信</button>
            </div>

            <!-- idは変えたくない = ユーザーから見えないようにする-->
            <input type="hidden" name="id" value="<?=$rs['id']?>">
        </form>

    </body>

    </html>