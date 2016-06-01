<?php
//prvo se pisi html-ot
require_once('database.php');
$db_connect=connect_to_db();//konektiranje do baza
$errors=array(
    'menu_name'=>'',
    'menu_position'=>'',
    'menu_visible'=>''
);

$menu_name=$menu_position='';
$menu_visible=0;
//na kraj pisis
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM subjects WHERE id=$id";
    $result=mysqli_query($db_connect, $query);
    $row=mysqli_fetch_assoc($result);

    if($row){
        $menu_name=$row['menu_name'];
        $menu_position=$row['position'];
        $menu_visible=$row['visible'];

    }

} else {
    $id=0;
}

//check if form was submitted
if(isset($_POST['insert'])){//sekogas se proveruva dali e setirano od name na button-ot
    $menu_name=$_POST['menu_name'];
    $menu_position=$_POST['menu_position'];//mora da bidi string pr.ako vnesi br ke bisi "4"
    $menu_visible=isset($_POST['menu_visible']) ? 1 : 0;//ako e true e 1 false 0
    //gornoto znaci-ako if(isset...) togas menu visible ke dobie vrednost true vo sprotivno false

    if(trim($menu_name)==''){//izbrisi gi site dopolnitelni karakteri ako e prazno
        //trim gi prisi praznite k-ri od pocetokot i krajot na stringot
        $errors['menu_name'] .="<br> Menu name cannot be empty";
    }
    if(strlen($menu_name) > 30){
        $errors['menu_name'] .="<br> Menu name cannot have more then 30 chars";
    }
if(trim($menu_position)=='') {
    $errors['menu_position'] .= "<br> Menu position cannot be empty";
}
    //(int) "aaa"==0
    //menu_position="4"
    //(int)menu_position=4
    //"4"==4 true
    if((int)$menu_position != $menu_position){
        $errors['menu_position'] .="<br> Menu position must be integer number";
    }
    if((int)$menu_position > 999){//proverva dali brojceto(int) e pogolemo od 999
        //(int) sluzi za pretvoranje vo integer
        $errors['menu_position'] .="<br> Menu position cannot be greather than 999";
    }

    //proverba na sostojba na elementite vo errors-dali validacijata e vo red
    //treba da napravime insert vo baza
    if($errors['menu_name']=='' && $errors['menu_position']=='' && $errors['menu_visible']==''){


        if($id==0) {
            $query = "INSERT INTO subjects (menu_name, position, visible)";
            $query .= "VALUES('$menu_name', $menu_position, $menu_visible)";
        }else if((int)$id > 0){
            $query = "UPDATE subjects SET ";
            $query .="menu_name= '" . $menu_name . "',";
            $query .="position = " . $menu_position . ",";
            $query .="visible= " . $menu_visible;
            $query .=" WHERE id= " . $id;
        }

        $result=mysqli_query($db_connect, $query);//query zavisi od prethodnata postapka
        if($result){//ako se insertiralo se vo baza napravi go slednoto
            header('Location:subjects_list.php');
            exit;
        }else{
            echo $query . " " .mysqli_errno($db_connect);//da ni javuva koja greska sme ja napravile vo kodot
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
    <form method="POST">
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
            <input type="checkbox" name="menu_visible" <?php if($menu_visible){ echo "checked='checked'";}?>>
            <label>Visible?</label>
            <span class="error"><?php echo $errors['menu_visible']; ?></span>

        </p>
        <p>
            <button type="submit" name="insert">Insert Menu</button>
        </p>
    </form>
</body>
</html>
