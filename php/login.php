<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <?php

    // 。セッションを使う前にsession_start()を呼び出さないとセッション変数が使えない
    session_start();
    $email = $_POST['email'];

    require_once('funcs.php');
    $pdo = db_conn();
    // 指定したハッシュがパスワードにマッチしているかチェック
    //$_SESSIONはログイン中のユーザー情報を一時的に保持するために使う変数
    //生のパスワードがハッシュ化されたパスワードと一致するかどうかをチェック
    $sql = "SELECT * FROM account WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $member = $stmt->fetch();
    // //指定したハッシュがパスワードにマッチしているかチェック
    if (password_verify($_POST['password'], $member['password'])) {
        //     //DBのユーザー情報をセッションに保存
        $_SESSION['id'] = $member['id'];
        $_SESSION['name'] = $member['name'];
        $msg = 'ログインしました。';
        $link = '<a href="../index.php">ホーム</a>';
    } else {
        $msg = 'メールアドレスもしくはパスワードが間違っています。';
        $link = '<a href="login_form.php">戻る</a>';
    }
    ?>

    <p><?php echo h($_SESSION['name']); ?>さん、こんにちは。</p>
    <h1><?php echo $msg; ?></h1>
    <?php echo $link; ?>

</body>