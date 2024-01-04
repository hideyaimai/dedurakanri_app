<?php


// データベースと繋げる
function connectToDatabase(){
    try {
        $db_name = 'dedura';
        $db_id   = 'root';
        $db_pw   = '';
        $db_host = 'localhost';
        $pdo     = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}



// db変更エラー時
function sqlError($stmt){
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}



//リダイレクト
function redirect($fileName){
    header('Location: ' . $fileName);
    exit();
}



// ログインチェク
function loginCheck(){
    if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] !== session_id() ){
        exit ("login error");
    }else{
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    };
}

?>