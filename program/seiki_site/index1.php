<?php

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['one'])) {
  echo 'ようこそ' .  ($_SESSION['ID']) . "さん<br>";
  ?>
  <button onclick="location.href='index5.php'">ログアウト</button>
  <?php
  exit;
}

 ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <h1>ようこそ、ログインしてください。</h1>
    <form action="index3.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id">
        <label for="password">password</label>
        <input type="password" name="password">
        <button type="submit">ログイン</button>
    </form>
    <a href="index6.php">新規登録はこちらから</a>
</body>

</html>