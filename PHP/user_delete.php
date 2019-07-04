<?php
// var_dump($_GET);
// exit();
// 関数ファイルの読み込み
include('functions.php');//functions.phpに接続


//1. GETデータ取得
$id=$_GET['id'];

//2. DB接続します(エラー処理追加)
$pdo=db_conn();//functions.phpに全部入力したからこれでOK


//3．データ登録SQL作成
$sql = 'DELETE FROM user_table WHERE id=:id';//注意：消すときはSELECTじゃない＊(ALL)もいらない
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //select.phpへリダイレクト
    header('Location: user_select.php');
    exit;
}