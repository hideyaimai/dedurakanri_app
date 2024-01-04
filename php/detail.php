<?php


$id = $_GET['id'];


// データベースに接続
require_once ('funcs.php');
$pdo = connectToDatabase();


//SQL作成
$stmt = $pdo->prepare(
    'SELECT * FROM site WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);


// 関数の実行
$status = $stmt->execute();


//表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>現場登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">現場一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>現場登録画面</legend>
                <label>現場名：<input type="text" name="siteName"       value="<?= $result['siteName'] ?>"       required></label><br>
                <label>発注者：<input type="text" name="client"         value="<?= $result['client'] ?>"         required></label><br>
                <label>着工日：<input type="date" name="startDate"      value="<?= $result['startDate'] ?>"      required></label><br>
                <label>竣工日：<input type="date" name="completionDate" value="<?= $result['completionDate'] ?>" required></label><br>
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>