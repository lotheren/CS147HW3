<?php
session_start();
define('__ROOT__', "/Applications/MAMP/htdocs/hw3");
require(__ROOT__ . "/controllers/Config.php");
require(__ROOT__ . "/controllers/CheckLogin.php");

if(CheckLogin()==FALSE)
{
    header("location:/hw3/index.php");
}
$user = $_SESSION['login_user'];
$date = date("Y/m/d");

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $getFileExtension=strtolower(end(explode('.',$_FILES['image']['name'])));
    $filetype= array("jpeg","jpg");

    if(in_array($getFileExtension,$filetype)=== false){
        $errors[]="extension not allowed, please choose a JPEG file.";
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../../resources/".$file_name);

        $sql = "INSERT INTO userimage (user, imagename, date)
                VALUES ('$user', '$file_name', '$date')";
        if ($db->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

        $db->close();


        echo "File uploaded";

    }else{
        print_r($errors);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Top Images</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../../styles/site.css">
</head>

<div class="container">
    <div id="sidebar">
        <?php include 'sideBar.php';?>
    </div>
    <div id="header">
        <h1>Image Rating</h1>
    </div>
    <div id="content">
        <div id="center">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" />
                <input type="submit"/>
            </form>
        </div>
    </div>
    <div id="footer">
        By Mike Bibb
    </div>
</div>
<div id="wrapper">

    <body>



</div>

</body>
</html>

