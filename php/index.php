<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
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

    <!-- method, action, 各inputのnameを確認してください。 -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>現場登録画面</legend>
                <label>現場名：<input type="text" name="siteName" required></label><br>
                <label>発注者：<input type="text" name="client" required></label><br>
                <label>着工日：<input type="date" name="startDate" required></label><br>
                <label>竣工日：<input type="date" name="completionDate" required></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
