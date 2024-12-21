<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

//フォームにJSでいたずらされないため、文字列として表示する
function h($stg){
  return htmlspecialchars($stg, ENT_QUOTES);
}

//db接続
function db_conn()
{
  try {
    //ローカルのデータベースにアクセスするための必要な情報を変数に渡す
    $db_name = 'gs_db'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    return $pdo;
  } catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
  }
}


