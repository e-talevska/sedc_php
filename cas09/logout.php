<?php
session_start();
session_destroy();
//unset($_SESSION['id']);
//unset($_SESSION['name']);
//remove the cookies as well
setcookie('id', null);
setcookie('name', $_COOKIE['name'], time()-3600); //setting the time in past
header("Location:login.php");
exit;
?>