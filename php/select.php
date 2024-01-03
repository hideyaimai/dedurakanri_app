<?php

// データベースに接続する
try {
    $db_name = 'dedura';
    $db_id   = 'root';
    $db_pw   = '';
    $db_host = 'localhost';
    $pdo     = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

// SQL
$stmt = $pdo->prepare(
    'SELECT * 
    FROM site;'
);

// 関数の実行をする
$status = $stmt->execute();

// 表示
$view ="";

if($status === false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .="<p>";
        $view .= '<a href="detail.php?id=' . $result['id'] . '">';
        $view .= $result["siteName"] . "<br>";
        $view .= $result["client"] . "<br>";
        $view .= '</a>';
        $view .= $result["startDate"] . "<br>";
        $view .= $result["completionDate"] . "<br>";
        $view .= '<a href="delete.php?id=' . $result['id'] . '">';
        $view .= "【削除】";
        $view .= '</a>';
        $view .="</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="log"><?= $view?></div>
    <form action="detail.php" method="post">
        <input type="submit" name="continue" value="追加で登録">
    </form>

</body>
</html>