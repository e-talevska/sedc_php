<?php
session_start();
session_destroy();
//unset($_session['id'])
//unset($_session['name'])

//remove the cookies
setcookie('id',null);
setcookie('name',$_COOKIE['name'],time()-3600); //setting the time in past
header("location: login.php");
exit;

?>