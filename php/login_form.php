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
    <div class="card">
        <span class="card__title">ログインページ</span>
        <p class="card__content">サービスを使うためにログインをお願いします。</p>
        <div class="card__form">
            <form action="login.php" method="post">
            <label for="email">メールアドレス:</label>
            <input type="email" class="email" name="email" required>
            <label for="password">パスワード:</label>
            <input type="password" class="password" name="password" placeholder="Your Password"><br>
            <input type="submit" class="submit" value="ログイン">
            </form>
        <p class="submit"><a href="../index.php">会員登録をする</a></p>
        </div>
    </div>
</body>