<?php
require_once('database.php');
$db_connect = connect_to_db();
$errors = array(
    'menu_name' => '',
    'menu_position' => '',
    'menu_visible' => ''
);
$menu_name = $menu_position = '';
$menu_visible = 0;

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = " SELECT * FROM subjects WHERE id = $id";
    $result = mysqli_query($db_connect, $query);
    $row = mysqli_fetch_assoc($result);

    if($row) {
        $menu_name = $row['menu_name'];
        $menu_position = $row['position'];
        $menu_visible = $row['visible'];
    }

} else {
    $id = 0;
}

//check if form vas submited
if(isset($_POST['insert'])){
    $menu_name = $_POST['menu_name'];
    $menu_position = $_POST['menu_position'];  // "4"
    $menu_visible = isset($_POST['menu_visible']) ? 1 : 0;

    if(trim($menu_name) == '') {
        $errors['menu_name'] .= "<br> Menu name cannot be emty";
    }

    if(strlen($menu_name) > 30) {
        $errors['menu_name'] .= "<br> Menu name cannot have more than 30 chars";
    }

    if(trim($menu_position) == '') {
        $errors['menu_position'] .= "<br> Menu position cannot be emty";
    }

    //(int) "aaa" == 0
    //$menu_position = "4"
    //(int)$menu_position = 4
    //"4" == 4 true
    if((int)$menu_position != $menu_position) {
        $errors['menu_position'] .= "<br> Menu position must be int number";
    }

    if((int)$menu_position > 999) {
        $errors['menu_position'] .= "<br> Menu position cannot be greather than 999";
    }

    //sostojba = validacija e vo red
    if($errors['menu_name'] == '' && $errors['menu_position'] == '' && $errors['menu_visible'] == '') {


        if($id == 0) {
            $query = "INSERT INTO subjects (menu_name, position, visible) ";
            $query .= "VALUES('$menu_name', $menu_position, $menu_visible)";
        } else if((int)$id > 0) {
            $query  = "UPDATE subjects SET";
            $query .= " menu_name = '" . $menu_name . "',";
            $query .= " position = " . $menu_position. ",";
            $query .= " visible  = " . $menu_visible;
            $query .= " WHERE id = " .$id;
//            echo $query;exit;
        }


        $result = mysqli_query($db_connect, $query);

        if($result){
            header('Location: subjects_list.php');
            exit;
        }

    }
}
disconnect_from_db($db_connect);
?>
<html>
    <head>
        <title>Insert into subjects</title>
    </head>
    <body>
        <form method="post">
            <input type="hidden" value="<?php echo $id; ?>" name="menu_id">
            <p>
                <label>Menu name:</label>
                <input type="text" name="menu_name" value="<?php echo $menu_name; ?>">
                <span class="error"><?php echo $errors['menu_name']; ?></span>
            </p>
            <p>
                <label>Menu position:</label>
                <input type="text" name="menu_position" value="<?php echo $menu_position; ?>">
                <span class="error"><?php echo $errors['menu_position']; ?></span>
            </p>
            <p>
                <input type="checkbox" name="menu_visible" <?php if($menu_visible) {echo "checked='checked'";} ?> >
                <label>Visible?</label>
                <span class="error"><?php echo $errors['menu_visible']; ?></span>
            </p>
            <p>
                <button type="submit" name="insert">Insert Menu</button>
            </p>
        </form>
    </body>
</html>