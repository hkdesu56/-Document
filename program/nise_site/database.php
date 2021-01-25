<?php
    //ユーザー名
    $user = "root";
    //パスワード
    $password = "";
    //利用するデータベース名
    $db_name = "sotuken3";
    //データベースサーバー名
    $db_server = "localhost";

    //DSN
    $dsn = "mysql:host={$db_server};dbname={$db_name};charset=utf8";

    //PDOを使う
    //インスタンスを作る
    try {
        $pdo = new PDO($dsn,$user,$password);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        header('Content-Type: text/plain; charset=UTF-8',true,500);
        echo $e->getMessage();
        exit();
    }
