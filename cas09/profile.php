<?php
// informatin about php configuration - phpinfo();exit;
session_start();
if(isset($_SESSION['id'])=== false) {
    header("Location: login.php");
    exit;
}

    if(isset($_POST['upload'])) {
        var_dump($_FILES);
        $file_errors = array(
            UPLOAD_ERR_INI_SIZE => 'File larger than upload_max_filesize',
            UPLOAD_ERR_FORM_SIZE => 'Post expands post_max_size',
            UPLOAD_ERR_PARTIAL => 'File not unploaded completely, please try again',
            UPLOAD_ERR_NO_FILE => 'Please chose a file to upload',
            UPLOAD_ERR_NO_TMP_DIR => 'No temporary directory found',
            UPLOAD_ERR_CANT_WRITE => 'Cannot write file to disk',
            UPLOAD_ERR_EXTENSION => 'File upload stopped by extension'
        );

        if($_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
            $allowed_types = array('image/jpeg','image/png','image/gif');
            $type = $_FILES['profile_picture']["type"];
            $size = $_FILES['profile_picture']["size"]/1024;
            //proveri dali e slika i dali e size < 300kb
//            if($type == 'image/jpeg' || $type == 'image/jpg' || 'image/gif');
            if(in_array($type, $allowed_types) && $size <=2000) {

                $name = $_FILES['profile_picture']['name'];
                if(file_exists("uploads/" . $name)) {
                    $pathinfo = pathinfo("uploads/" . $name);
                    $name = $pathinfo ['filename'] . time() . '.' . $pathinfo['extension'];
                }

                if(move_uploaded_file($_FILES['profile_picture']['tmp_name'], "uploads/" . $name)) {
                    $errors['profile_picture'] = "File upload was successful";
                    $pathinfo = pathinfo("uploads/" . $_FILES['profile_picture']['name']);
                }else{
                    $errors['profile_picture'] = "File upload was not successful";
                }

            } else {

                //soodvetna poraka
                if(!in_array($type, $allowed_types)) {
                    $errors['profile_picture'] = "Not allowed file type. Please upload jpg,png if gif";
                }

                if($size > 2000) {
                    $errors['profile_picture'] = "File too large. Please upload files up to 300kb";
                }

            }
        }else{
            $error = $_FILES['profile_picture']['error']; //4
            $errors['profile_picture'] = $file_errors[$error];
        }
    }

?>

<html>
<head>
    <title>Login form</title>
</head>
<body>
    <?php echo "<h2>" . $_SESSION['name'] . "</h2>"; ?>
    <br>
    <a href="logout.php">Log out</a>
    <form method="POST" enctype="multipart/form-data">
        <p>
            <label>Upload profile picture</label>
            <input type="file" name="profile_picture">
            <br>
            <span><?php if (isset($errors['profile_picture'])) {echo $errors['profile_picture'];}?></span>
        </p>
        <p>
            <button type="submit" name="upload">Upload</button>
        </p>
      </form>
    </body>
</html>

