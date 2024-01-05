<?php

session_start();

// スクリプト上のsessionデータを削除している。
$_SESSION = [];

// ブラウザのクッキーからsessionデータを削除している。
if (isset($_COOKIE[session_name()])) { 
    setcookie(session_name(), '', time() - 42000, '/');
}

// サーバーからsessionデータを削除している。
session_destroy();


header("Location: login.php");
exit();

?>