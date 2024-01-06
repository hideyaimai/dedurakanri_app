<?php

session_start();


$loginId = $_POST["loginId"];
$loginPw = $_POST["loginPw"];


require_once("funcs.php");
$pdo = connectToDatabase();


$stmt = $pdo->prepare('SELECT * FROM user WHERE userId = :loginId AND userPassword = :loginPw ;');
$stmt->bindValue(':loginId', $loginId, PDO::PARAM_STR);
$stmt->bindValue(':loginPw', $loginPw, PDO::PARAM_STR);
$status = $stmt->execute();


if($status === false){
    sqlError($stmt);
}


$val = $stmt->fetch();


if( $val['id'] != ''){
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['userName'] = $val['userName'];
    header('Location: index.php');
}else{
    header('Location: login.php');
}
    
exit();