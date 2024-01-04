<?php

$id     = $_GET['id'];


// データベースに接続
require_once ('funcs.php');
$pdo = connectToDatabase();


// SQL
$stmt = $pdo->prepare(
    "DELETE FROM site WHERE id = :id; ");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);


// 関数の実行
$status = $stmt->execute(); 


//４．データ登録処理後
if ($status === false) {
    sqlError($stmt);
} else {
    redirect("select.php");
}