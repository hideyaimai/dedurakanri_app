<?php

// インデックスからデータを受け取る
$siteName       = $_POST["siteName"];
$client         = $_POST["client"];
$startDate      = $_POST["startDate"];
$completionDate = $_POST["completionDate"];


// データベースに接続
require_once ('funcs.php');
$pdo = connectToDatabase();


// クエリを作成
$stmt = $pdo->prepare(
    'INSERT INTO 
    site  ( id, siteName, client, startDate, completionDate, creationDate, modificationDate)
    VALUES( null, :siteName, :client, :startDate, :completionDate, sysdate(), sysdate());'
);


// バインドしてクエリに代入する
$stmt->bindValue(':siteName', $siteName, PDO::PARAM_STR);
$stmt->bindValue(':client', $client, PDO::PARAM_STR);
$stmt->bindValue(':startDate', $startDate, PDO::PARAM_STR);
$stmt->bindValue(':completionDate', $completionDate, PDO::PARAM_STR);


// 関数の実行をする
$status = $stmt->execute();


// 実行後検証
if ($status === false) {
    sqlError($stmt);
} else {
    redirect("select.php");
}

?>