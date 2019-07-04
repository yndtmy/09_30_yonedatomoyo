<?php
include('functions.php');//functions.phpに接続
var_dump($_POST);
// exit();//PHPをここでストップ
// 入力チェック
if(
    !isset($_POST['nn']) || $_POST['nn']=='' ||//nameOKじゃない(!)ときORnameが空の時
    !isset($_POST['lid']) || $_POST['lid']==''||
    !isset($_POST['lpw']) || $_POST['lpw']==''||
    !isset($_POST['kanri_flg']) || $_POST['kanri_flg']==''||
    !isset($_POST['life_flg']) || $_POST['life_flg']==''
    
){
    exit('paramError');//paramErrorと表示するよ
}

//POSTデータ取得
$nn=$_POST['nn'];//$nnを指定
$lid=$_POST['lid'];//同上
$lpw=$_POST['lpw'];//同上
$kanri_flg=$_POST['kanri_flg'];//同上
$life_flg=$_POST['life_flg'];//同上


//DB接続
$pdo=db_conn();//functions.phpに全部入力したからこれでOK


//データ登録SQL作成
$sql ='INSERT INTO user_table(id,nn,lid,lpw,kanri_flg,life_flg)VALUES(NULL, :a1, :a2, :a3, :a4,:a5)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1',$nn, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2',$lid, PDO::PARAM_STR);
$stmt->bindValue(':a3',$lpw, PDO::PARAM_STR);
$stmt->bindValue(':a4',$kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(':a5',$life_flg, PDO::PARAM_STR);
$status = $stmt->execute();
// exit();
//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);//sqlErrorが文字で表示エラーコードはもともと決まっている

} else {
    //５．index.phpへリダイレクト
    header('Location: user_index.php');
    
}