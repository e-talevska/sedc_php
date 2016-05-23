<?php
session_start();
if(isset($_SESSION['id'])===false){
    header("location: login.php");
    exit;

}
var_dump(__FILE__);
$errors=array();
if(isset($_POST['upload'])){
    var_dump($_FILES);
    $file_errors=array(
        UPLOAD_ERR_INI_SIZE => 'file larger then upload_max_filesize',
        UPLOAD_ERR_FORM_SIZE => 'post expands post_max_size',
        UPLOAD_ERR_PARTIAL => 'file not uploaded completely, please try again',
        UPLOAD_ERR_NO_FILE => 'please choose a file to upload',
        UPLOAD_ERR_NO_TMP_DIR => 'no temporary directory found',
        UPLOAD_ERR_CANT_WRITE => 'cannot write to disk',
        UPLOAD_ERR_EXTENSION => 'file upload stopped by extension'
    );

    if($_FILES['profile_picture']['error']==UPLOAD_ERR_OK){
        if($_FILES['profile_picture']['type']=="image/jpeg" || $_FILES['profile_picture']['type']=="image/gif"||$_FILES['profile_picture']['type']=="image/png" ){
            if((($_FILES['profile_picture']['size'])/1024)<300){
                $name=$_FILES['profile_picture']['name'];
                if(file_exists("uploads/").$name){
                    $pathinfo=pathinfo("uploads/".$name);
                    $name=$pathinfo['filename'].time().".".$pathinfo['extension'];
                }
                if(move_uploaded_file($_FILES['profile_picture']['tmp_name'],"uploads/".$name)){
                    $errors['profile_picture']="file uploads was successful";


                }

                else{
                    $errors['profile_picture']="file uploads was not successful";
                }

            }
            else{

               $errors['profile_picture']="the uploaded file is too big";
            }


    }
        else{
            $errors['profile_picture']="the uploaded file is not a picture";
        }

    }
    else{
        $error=$_FILES['profile_picture']['error'];
        $errors['profile_picture']=$file_errors[$error];
    }
}

?>

<html>
    <head>
        <title>profile page</title>
    </head>
    <body>
        <?php echo "<h2>".$_SESSION['name']."</h2>"; ?>
        <br>
        <a href="logout.php">log out</a>
        <form method="post" enctype="multipart/form-data">
            <p>
                <label> upload profile picture</label>
                <input type="file" name="profile_picture">
                <br>
                <span>
                    <?php if(isset($errors['profile_picture'])){echo $errors['profile_picture'];} ?>
                </span>
            </p>
            <p>
                <button type="submit" name="upload">upload</button>
            </p>
        </form>
    </body>
</html>
