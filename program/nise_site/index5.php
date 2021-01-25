<?php
session_start();
$output = '';
if (isset($_SESSION['ID']) && isset($_SESSION['one'])) {
  $output = 'Logoutしました。<br><a href="home.php">トップページ</a>';

}else{
    $output = 'SessionがTimeoutしました。';
}
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
@session_destroy();

echo $output;