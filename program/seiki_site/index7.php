<?php
require_once('database.php');
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['one'])) {
    ?>
    <!DOCTYPE html>
    <html lang="ja">
    <head>
    <meta charset="utf-8">
    <title>Login</title>
    <style type="text/css">
        body {
            color: #000000;
            margin-right: auto;
            margin-left: auto;
            width: 700px;
        }
    </style>
    </head>
    <body>
        <form action="index8.php" method="post">
        <label for="koza">送金先の口座番号</label>
        <input type="number" name="koza"><br>
        <label for="kane">金額</label>
        <input type="number" name="kane"><br>
        <button type="submit">送金</button>
        </form>
    </body>
    <?php
}else{
    echo "エラー";
    echo "<br><a href='home.php'>戻る</a>";
    return false;
}
