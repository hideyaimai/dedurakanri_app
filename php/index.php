<?php
// ログインセッションの開始
session_start();

// ユーザー認証関連の関数を含むファイルの読み込み
require_once("funcs.php");
loginCheck();

// ビュー（HTMLファイル）の読み込み
require_once('index_view.php');
?>
