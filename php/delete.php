<?php

$id     = $_GET['id'];

// データベースに接続
try {
    $db_name = 'dedurakanri';
    $db_id   = 'root';
    $db_pw   = '';
    $db_host = 'localhost';
    $pdo     = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

// SQL
$stmt = $pdo->prepare(
    "DELETE FROM site WHERE id = :id; ");

$stmt->bindValue(':id', $id, PDO::PARAM_INT);

// 関数の実行
$status = $stmt->execute(); 

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: select.php');
    exit();
}