<?php
require_once('database.php');
$id = htmlspecialchars($_POST['id'], ENT_QUOTES,"UTF-8");
$mailaddress = htmlspecialchars($_POST['mailaddress'], ENT_QUOTES,"UTF-8");
$password = htmlspecialchars($_POST['password'], ENT_QUOTES,"UTF-8");
$id = filter_input(INPUT_POST, 'id');
if (!$mailaddress2 = filter_var($mailaddress, FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です。';
  return false;
}
if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $password)) {
  $password2 = password_hash($password, PASSWORD_DEFAULT);
} else {
  echo 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。';
  echo "<br><a href='index1.php'>戻る";
  return false;
}
$kane =1000;
try {
  $sql = "INSERT INTO nise(id,mailaddress,password) VALUE(:id,:mailaddress,:password)";
  $stm = $pdo->prepare($sql);
  $stm->bindValue(':id',$id,PDO::PARAM_STR);
  $stm->bindValue(':mailaddress',$mailaddress2,PDO::PARAM_STR);
  $stm->bindValue(':password',$password2,PDO::PARAM_STR);
  $stm->execute();
  $result = $stm->fetchAll(PDO::FETCH_ASSOC);
  echo '登録完了';
  echo "<br><a href='home.php'>戻る</a>";
} catch (\Exception $e) {
  echo '登録済みのアカウントです。';
  echo "<br><a href='home.php'>戻る</a>";
}
