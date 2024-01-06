<?php

session_start();

// データベースに接続
require_once ('funcs.php');
$pdo = connectToDatabase();


// session_idの確認と再発行
loginCheck();


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
    sqlError($stmt);
}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .="<p>";
        $view .= '<a href="site_detail.php?id=' . $result['id'] . '">';
        $view .= $result["siteName"] . "<br>";
        $view .= '</a>';
        $view .= $result["client"] . "<br>";
        $view .= $result["startDate"];
        $view .= ' 〜 ';
        $view .= $result["completionDate"] . "<br>";
        $view .= '<a href="site_delete.php?id=' . $result['id'] . '">';
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
    <form action="index.php" method="post">
        <input type="submit" name="continue" value="追加で登録">
    </form>

</body>
</html>