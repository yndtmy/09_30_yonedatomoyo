<?php
// 関数ファイル読み込み
include('functions.php');
// var_dump($_POST);
// exit();

//入力チェック(受信確認処理追加)
if (!isset($_POST['name']) || $_POST['name']=='' ||//nameOKじゃない(!)ときORnameが空の時
    !isset($_POST['address']) || $_POST['address']==''||
    !isset($_POST['url']) || $_POST['url']==''||
    !isset($_POST['toilet']) || $_POST['toilet']==''||
    !isset($_POST['toilet_comment']) || $_POST['toilet_comment']==''||
    !isset($_POST['slide']) || $_POST['slide']==''||
    !isset($_POST['sandbox']) || $_POST['sandbox']==''||
    !isset($_POST['swing']) || $_POST['swing']==''||
    !isset($_POST['ball']) || $_POST['ball']==''||
    !isset($_POST['url']) || $_POST['url']==''||
    !isset($_POST['drink']) || $_POST['drink']==''||
    !isset($_POST['comment']) || $_POST['comment']=='') {
    exit('ParamError');
}

//POSTデータ取得
$id=$_POST['id'];//$idを指定
$name=$_POST['name'];//$taskを指定
$address=$_POST['address'];//同上
$url=$_POST['url'];//同上
$toilet=$_POST['toilet'];//同上
$toilet_comment=$_POST['toilet_comment'];//同上
$slide=$_POST['slide'];//同上
$sandbox=$_POST['sandbox'];//同上
$swing=$_POST['swing'];//同上
$ball=$_POST['ball'];//同上
$drink=$_POST['drink'];//同上
$date=$_POST['date'];//同上
$comment=$_POST['comment'];//同上



//DB接続します(エラー処理追加)
$pdo=db_conn();//functions.phpに全部入力したからこれでOK

//データ登録SQL作成
// $sql ='UPDATE 07_30_yonedatomoyo(id,name1,address1,url1,toilet,toilet_comment,slide,sandbox,swing,ball,drink,date1,comment)VALUES(NULL, :a1, :a2, :a3, :a4, :a5, :a6, :a7, :a8, :a9, :a10, sysdate(), :a11)';
$sql = 'UPDATE 07_30_yonedatomoyo SET name1=:a1,address1=:a2,url1=:a3,toilet=:a4,toilet_comment=:a5,slide=:a6,sandbox=:a7,swing=:a8,ball=:a9,drink=:a10,date1=:a11,comment=:a12 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1',$name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2',$address, PDO::PARAM_STR);
$stmt->bindValue(':a3',$url, PDO::PARAM_STR);
$stmt->bindValue(':a4',$toilet, PDO::PARAM_STR);
$stmt->bindValue(':a5',$toilet_comment, PDO::PARAM_STR);
$stmt->bindValue(':a6',$slide, PDO::PARAM_STR);
$stmt->bindValue(':a7',$sandbox, PDO::PARAM_STR);
$stmt->bindValue(':a8',$swing, PDO::PARAM_STR);
$stmt->bindValue(':a9',$ball, PDO::PARAM_STR);
$stmt->bindValue(':a10',$drink, PDO::PARAM_STR);
$stmt->bindValue(':a11',$date, PDO::PARAM_STR);
$stmt->bindValue(':a12',$comment, PDO::PARAM_STR);
$stmt->bindValue(':id',$id, PDO::PARAM_STR);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: select.php');
    exit;
}