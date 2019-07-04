<?php
// 関数ファイル読み込み
include('functions.php');//functions.phpに接続
// var_dump($_POST);
// exit();

//入力チェック(受信確認処理追加)
if (!isset($_POST['nn']) || $_POST['nn']=='' ||//nameOKじゃない(!)ときORnameが空の時
    !isset($_POST['lid']) || $_POST['lid']==''||
    !isset($_POST['lpw']) || $_POST['lpw']==''||
    !isset($_POST['kanri_flg']) || $_POST['kanri_flg']==''||
    !isset($_POST['life_flg']) || $_POST['life_flg']=='') {
    exit('ParamError');
}

//POSTデータ取得
$id=$_POST['id'];//$idを指定
$nn=$_POST['nn'];//$nnを指定
$lid=$_POST['lid'];//同上
$lpw=$_POST['lpw'];//同上
$kanri_flg=$_POST['kanri_flg'];//同上
$life_flg=$_POST['life_flg'];//同上



//DB接続します(エラー処理追加)
$pdo=db_conn();//functions.phpに全部入力したからこれでOK

//データ登録SQL作成
$sql = 'UPDATE user_table SET nn=:a1,lid=:a2,lpw=:a3,kanri_flg=:a4,life_flg=:a5 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1',$nn, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2',$lid, PDO::PARAM_STR);
$stmt->bindValue(':a3',$lpw, PDO::PARAM_STR);
$stmt->bindValue(':a4',$kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(':a5',$life_flg, PDO::PARAM_STR);
$stmt->bindValue(':id',$id, PDO::PARAM_STR);
$status = $stmt->execute();
// exit();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: user_select.php');
    exit;
}