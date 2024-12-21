<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

//フォームにJSでいたずらされないため、文字列として表示する
function h($stg){
  return htmlspecialchars($stg, ENT_QUOTES);
}

