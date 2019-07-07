<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();

$menu = menu();

//Fileアップロードチェック
// var_dump($_FILES);
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] ==0) {
    // ファイルをアップロードしたときの処理
    // ①送信ファイルの情報取得
    $uploadedFileName = $_FILES['upfile']['name'];//ファイル名を取ってくる
    $tempPathName = $_FILES['upfile']['tmp_name'];//tmpフォルダをとってくる
    $fileDirectoryPath = 'upload/';//uploadにアップロードする
    // var_dump($uploadedFileName);
    // var_dump($tempPathName);

    // ②File名の準備
    $extension = pathinfo($uploadedFileName, PATHINFO_EXTENSION);//$uploadedFileNameの拡張子だけをもってくる
    $uniqueName = date('YmdHis').md5(session_id()) . "." . $extension;//日付と文字列.拡張子を表示
    $fileNameToSave = $fileDirectoryPath.$uniqueName;//ファイルをそこに保存する
    // var_dump($fileNameToSave);    
    // exit();

    // ③サーバの保存領域に移動&④表示
    if(is_uploaded_file($tempPathName)){
        if(move_uploaded_file($tempPathName, $fileNameToSave)){//一時保存のところにデータがあれば
        chmod($fileNameToSave, 0644);//権限を0644に変更
        $img = '<img src="'. $fileNameToSave . '" >';// imgタグを設定
        }else{//一時保存のところにデータがなければ
            $img='保存に失敗しました';//こう表示
        }
    }else{
        $img='画像があがってないです';//こう表示
    }
} else {
    // ファイルをアップしていないときの処理
    $img = '画像が送信されていません';
}


?>


    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>公園共有APP</title>
        <link href="../css/main.css">
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
            <a class="btn" href="select.php">公園一覧</a>
            <a class="btn" href="index.php">公園登録</a>
            <a class="btn" href="user_select.php">会員一覧</a>
            <a class="btn" href="user_index.php">会員登録</a>

            <?php else: ?>
            <a class="btn" href="user_select.php">会員一覧</a>
            <a class="btn" href="user_index.php">会員登録</a>
            <?php endif; ?>
            <a class="btn" href="logout.php">ログアウト</a>
        </div>

        <form action="insert.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="address">住所</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url">
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
                <textarea class="form-control" id="toilet_comment" rows="1" name="toilet_comment"></textarea>
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
                <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
            </div>

            <div class="form-group">
                <label for="date">写真アップ</label>
                <input type="file" class="form-control" id="date" name="upfile" accept="image/*" capture="camera">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">送信</button>
            </div>
        </form>




    </body>

    </html>