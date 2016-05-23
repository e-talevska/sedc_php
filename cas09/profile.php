<?php

session_start();
if(isset($_SESSION['id'])==false){
    header("Location:login.php");
    exit;
}
var_dump(dirname(__FILE__));
$errors=array();
if(isset($_POST['upload'])){
    var_dump($_FILES);
    $file_errors=array(
        UPLOAD_ERR_INI_SIZE=>'File larger than upload_max_filesize',
        UPLOAD_ERR_FORM_SIZE=>'Post expands post_max_size',
        UPLOAD_ERR_PARTIAL=>'File not uploaded completely, please try again',
        UPLOAD_ERR_NO_FILE=>'Please choose a file to upload',
        UPLOAD_ERR_NO_TMP_DIR=>'No temporary directory found',
        UPLOAD_ERR_CANT_WRITE=>'Cannot write file to disk',
        UPLOAD_ERR_EXTENSION=>'File upload stopped by extension'
    );

    if($_FILES['profile_picture']['error']==UPLOAD_ERR_OK) {
        if ($_FILES['profile_picture']['type'] == "image/jpeg" || $_FILES['profile_picture']['type'] == "image/png" ||
            $_FILES['profile_picture']['type'] == "image/gif") {
            if (($_FILES['profile_picture']['size']/1024) < 300) {

                $name=$_FILES['profile_picture']['name'];
                if(file_exists("uploads/" . $name)){
                    $pathinfo = pathinfo("uploads/" . $name);
                    $name=$pathinfo['filename'] . time() . ".". $pathinfo['extension'];
                    //vo slucaj imeto da se poklopi so drugo ime
                }

                if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], "uploads/" . $name)) {
                    $errors['profile_picture'] = "File upload was successfull";


                } else {
                    $errors['profile_picture'] = "File upload was not successfull";
                }
                //dokolku se 2 if-a vgnezdeni za size i type ima drug potezok nacin-najdi vo github

            } else {
                $errors['profile_picture'] = "The size of the file is too big/small";
            }
        }else{
            $errors['profile_picture'] = "The type is not image";

        }
    }else{
        $error=$_FILES['profile_picture']['error'];//4
        $errors['profile_picture']=$file_errors[$error];
    }
}
?>


<html>
<head><title>Profile page</title></head>
<body>
<?php echo "<h2>" . $_SESSION['name'] . "</h2>"; ?>
        <br>
        <a href="logout.php">Log out</a>
    <form method="POST" enctype="multipart/form-data">

        <p>
            <label>Upload profile picture</label>
            <input type="file" name="profile_picture">
            <br>
            <span><?php if(isset($errors['profile_picture'])) { echo $errors['profile_picture'];} ?></span>
        </p>
        <p>
            <button type="submit" name="upload">Upload</button>
        </p>
    </form>
</body>
</html>

