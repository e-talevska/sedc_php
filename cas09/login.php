<?php
session_start();

if(isset($_SESSION['id'])==false){
    if(isset($_COOKIE['id'])){
        $_SESSION['id']=$_COOKIE['id'];
        $_SESSION['name']=$_COOKIE['name'];
        setcookie("id",$_COOKIE['id'],time()+3600*24*30);
        setcookie("name",$_COOKIE['name'],time()+3600*24*30);

    }
}

if(isset($_SESSION['id'])){
    header("location: profile.php");
    exit;
}

require('users.php');
$errors=array();
$username=$password='';
if (isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    if(isset($_POST['rememberme'])){
        $rememeber_me=true;
    }
    else{
        $rememeber_me=false;
    }
    foreach($users as $user){
        if ($user['username']==$username && $user['password']==$password){
            if($rememeber_me){
                setcookie("id",$user['id'],time()+3600*24*30);
                setcookie("name",$user['name'],time()+3600*24*30);
            }
            //todo:zacuvaj vo sesija i prenasoci na
            // profile.php
            $_SESSION['id']=$user['id'];
            $_SESSION['name']=$user['name'];
            header("location: profile.php");
            exit;
        }
    }
    $errors['username']="greshni podatoci za avtentikacija";
    $errors['password']="greshen password";
}
?>

<html>
    <head>
        <title>
            login form
        </title>

    </head>
    <body>
        <form method="post">
            <p>
                <label>
                    username
                </label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span>
                    <?php if(isset($errors['username'])){
                        echo $errors['username'];
                    } ?>
                </span>
            </p>
            <p>
                <label>
                    password
                </label>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <span>
                     <?php if(isset($errors['password'])){
                     echo $errors['password'];
                     } ?>
                </span>
            </p>
            <p>
                <input id="rememberme" type="checkbox" name="rememberme">
                <label for="rememberme"> keep me logged in</label>
            </p>
            <p>
                <button type="submit" name="login">login</button>
            </p>
        </form>
    </body>
</html>
