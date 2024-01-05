<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="login_act.php">
        <div class="jumbotron">
            <fieldset>
                <legend>現場登録画面</legend>
                <label>ID:<input type="text" name="loginId" required></label><br>
                <label>PW:<input type="password" name="loginPw" required></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>
</html>