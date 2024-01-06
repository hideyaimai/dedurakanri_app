<?php

session_start();

// funcs.phpから関数を呼び出して、ログインチェックとデータベース接続
require_once("funcs.php");
loginCheck();
$pdo = connectToDatabase();


// データベースからuserテーブルをsqlで表示
$stmt = $pdo->prepare(
    'SELECT * FROM user;'
);


// 作ったsqlを実行
$status = $stmt->execute();


// htmlに表示するための変数
$view ="";


// view変数の中身作るよ
if($status === false){
    sqlError($stmt);
}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .="<p>";
        $view .= '<a href="user_detail.php?id=' . $result['id'] . '">';
        $view .= $result["userName"] . "<br>";
        $view .= '</a>';
        $view .= '<a href="user_delete.php?id=' . $result['id'] . '">';
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