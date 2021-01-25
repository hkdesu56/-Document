<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>盛序毘銀行(偽)</title>
  <link rel="stylesheet" href="css/style.css">
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
  <header>
    <h1><a>盛序毘銀行　ホーム画面</a></h1>
    <nav>
      <ul>
        <?php

        function h($s)
        {
          return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
        }



        session_start();

        if (isset($_SESSION['ID']) && isset($_SESSION['one'])) {
          echo 'ようこそ' .  h($_SESSION['ID']) . "さん<br>";
        ?>
           <button onclick="location.href='index.7.php'">送金</button><br>
           <button type="button">明細</button><br>
           <button onclick="location.href='index5.php'">ログアウト</button>
        <?php
          exit;
          }else {
          echo '<a href="index1.php"><img src="タイトルなし.png" width=173 height=50 alt="ログイン"></a>';
        }
        ?>
      </ul>
    </nav>
  </header>
</body>
</html>
