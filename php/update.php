<?php

// データをポストで獲得する
$siteName       = $_POST["siteName"]      ;
$client         = $_POST["client"]        ;
$startDate      = $_POST["startDate"]     ;
$completionDate = $_POST["completionDate"];
$id             = $_POST["id"]            ;

// データを接続する
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
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: index.php');
    exit();
}


?>