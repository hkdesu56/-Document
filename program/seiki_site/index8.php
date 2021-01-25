<?php
require_once('database.php');
session_start();
$koza = htmlspecialchars($_POST['koza'], ENT_QUOTES,"UTF-8");
$kane = htmlspecialchars($_POST['kane'], ENT_QUOTES,"UTF-8");
$id = $_SESSION['ID'];
if (isset($id) && isset($_SESSION['one']) && isset($koza) && isset($kane)) {
    try {
        $sql = 'SELECT * FROM login WHERE id = :id';
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id',$id,PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
    $zan = $result['kane'] - $kane;
    $sql = "UPDATE login SET kane = :zan WHERE id = :id";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':zan',$zan,PDO::PARAM_STR);
    $stm->bindValue(':id',$id,PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo "${koza}に${kane}円送金されました。<br>残り残高${zan}円";
    echo "<br><a href='home.php'>戻る</a>";
}else{
    echo "エラー";
    echo "<br><a href='home.php'>戻る</a>";
    return false;
}
