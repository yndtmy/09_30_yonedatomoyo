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


    <form method="post" action="login_act.php">
        <div class="form-group">
            <label for="lid">LoginID</label>
            <input type="text" class="form-control" id="lid" name='lid'>
        </div>
        <div class="form-group">
            <label for="lpw">Pass</label>
            <input type="password" class="form-control" id="lpw" name='lpw'>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</body>

</html>