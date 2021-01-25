<?php

require_once('database.php');

session_start();
$id = htmlspecialchars($_POST['id'], ENT_QUOTES,"UTF-8");
$password = htmlspecialchars($_POST['password'], ENT_QUOTES,"UTF-8");
try {
  $sql = 'SELECT * FROM login WHERE id = :id';
  $stm = $pdo->prepare($sql);
  $stm->bindValue(':id',$id,PDO::PARAM_STR);
  $stm->execute();
  $result = $stm->fetch(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
if (!isset($result['id'])) {
  echo 'ID又はパスワードが間違っています。';
  echo "<br><a href='home.php'>戻る</a>";
  return false;
}
if (password_verify($_POST['password'], $result['password'])) {
  $_SESSION['ID'] = $result["id"];
  $subject = "ワンタイムパスワード";
  $one = mt_rand(000000, 999999);
  $to = $result["mailaddress"];
  $res = mb_send_mail($to, $subject, $one);
  ?>
  <form action="index4.php" method="post">ワンタイムパスワード<input type="number" name="oneCode">
<input type="hidden" name="one" value="<?php echo $one ?>">
<input type="submit" value="送信">
</form>
<?php
} else {
  echo 'ID又はパスワードが間違っています。';
  echo "<br><a href='home.php'>戻る</a>";
  return false;
}
?>