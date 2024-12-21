<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password  = password_hash($_POST['password'], PASSWORD_DEFAULT);  //**password_hash()**を使ってハッシュ化したパスワードをデータベースに登録



//ローカルのデータベースにアクセスするための必要な情報を変数に渡す
$db_name = 'gs_db';
$db_host = 'localhost';
$db_id = 'root';
$db_pw ='';

//try catch構文でデータベースの情報取得を実施
try {
  $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host,$db_id,$db_pw);
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}
$stmt = $pdo->prepare("INSERT
                            INTO
                        account(id, name, email,password, date)
                        VALUES(NULL, :name, :email, :password, now())"
                    );

$stmt->bindValue(':name', $name, PDO::PARAM_STR);//PARAM_STRは文字列を指定
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  // ５．index.phpへリダイレクト
    header('Location: welcome.php');
}
?>