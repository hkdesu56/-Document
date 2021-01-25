<?php
session_start();
if (!isset($_SESSION['ID'])) {
  echo 'エラー';
  echo "<br><a href='home.php'>戻る</a>";
  return false;
}
$one = filter_input(INPUT_POST, 'one');

$oneCode = filter_input(INPUT_POST, 'oneCode');

if($one === $oneCode){
  $_SESSION['one'] = $one;
  echo 'ログインしました';
  echo "<br><a href='home.php'>会員ぺージ</a>";
}else{
    echo "エラー";
    echo "<br><a href='home.php'>戻る</a>";
}