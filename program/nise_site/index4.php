<?php
require_once('database.php');
session_start();
$id = $_SESSION['ID'];
$one = htmlspecialchars($_POST['one'], ENT_QUOTES,"UTF-8");
if (!isset($id) || !isset($one)) {
  echo '  エラー';
  return false;
}
$sql = "INSERT INTO onetime(id,one) VALUE(:id,:one)";
$stm = $pdo->prepare($sql);
$stm->bindValue(':id',$id,PDO::PARAM_STR);
$stm->bindValue(':one',$one,PDO::PARAM_INT);
$stm->execute();
$result = $stm->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['one'] = $one;
echo 'ログインしました';
echo "<br><a href='home.php'>会員ぺージ</a>";