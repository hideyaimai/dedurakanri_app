<?php

// データをポストで獲得する
$siteName       = $_POST["siteName"]      ;
$client         = $_POST["client"]        ;
$startDate      = $_POST["startDate"]     ;
$completionDate = $_POST["completionDate"];
$id             = $_POST["id"]            ;


// データ接続
require_once('funcs.php');
connectToDatabase();


// SQL
$stmt = $pdo->prepare(
    "UPDATE site
    SET siteName = :siteName, client = :client, startDate = :startDate, completionDate = :completionDate, modificationDate = sysdate()
    WHERE id = :id; ");


// データの代入をする
$stmt->bindValue(':siteName'        , $siteName        , PDO::PARAM_STR);
$stmt->bindValue(':client'          , $client          , PDO::PARAM_STR);
$stmt->bindValue(':startDate'       , $startDate       , PDO::PARAM_STR);
$stmt->bindValue(':completionDate'  , $completionDate  , PDO::PARAM_STR);
$stmt->bindValue(':id'              , $id              , PDO::PARAM_INT);


// 関数の実行
$status = $stmt->execute();


// 実行結果
if ($status === false) {
    sqlError($stmt);
} else {
    redirect("select.php");
}


?>