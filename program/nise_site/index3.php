<?php

require_once('database.php');

session_start();
$id = htmlspecialchars($_POST['id'], ENT_QUOTES,"UTF-8");
$password = htmlspecialchars($_POST['password'], ENT_QUOTES,"UTF-8");
  $sql = "INSERT INTO nise(id,password) VALUE(:id,:password)";
  $stm = $pdo->prepare($sql);
  $stm->bindValue(':id',$id,PDO::PARAM_STR);
  $stm->bindValue(':password',$password,PDO::PARAM_STR);
  $stm->execute();
  $result = $stm->fetchAll(PDO::FETCH_ASSOC);
  $_SESSION['ID'] = $id;
?>
<form action="index4.php" method="post">ワンタイムパスワード<input type="number" name="one">
<input type="submit" value="送信">
</form>