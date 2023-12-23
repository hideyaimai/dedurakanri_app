<?php
// インデックスからデータを受け取る
$siteName       = $_POST["siteName"];
$client         = $_POST["client"];
$startDate      = $_POST["startDate"];
$completionDate = $_POST["completionDate"];

// データベースと接続する
try {
    $db_name = 'dedurakanri';
    $db_id   = 'root';
    $db_pw   = '';
    $db_host = 'localhost';
    $pdo     = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

// クエリを作成する
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
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: index.php');
    exit();
}

?>