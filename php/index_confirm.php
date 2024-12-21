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
// 入力データの取得
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

?>
    <div class="card">
        <span class="card__title">ユーザー登録</span>
        <p class="card__content">こちらで登録いたします。</p>
        <div class="card__form">
            <p>ユーザー名:<?= $name ?></P>
            <p>メールアドレス:<?= $email ?></P>
            <p>パスワード:<?= $password ?></P>
        </div>
        <!-- hiddenで隠してformを作成し、formの内容はvalueで入力する -->
            <form action="insert.php" method="post">
                <input type="hidden" name="name" value="<?= $name ?>">
                <input type="hidden"  name="email" value="<?= $email ?>">
                <input type="hidden"  name="password" value="<?= $password ?>">
                <input type="submit"  class="submit" value="送信">
            </form>
        <p class="submit"><a href="../index.php">修正する</a></p>
    </div>

</body>
</html>
