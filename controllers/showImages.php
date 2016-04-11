<?php

session_start();
define('__ROOT__', "/Applications/MAMP/htdocs/hw3");
require(__ROOT__ . "/controllers/Config.php");
require(__ROOT__ . "/controllers/CheckLogin.php");
require(__ROOT__ . "/controllers/updatedbs.php");

$mysqli = new mysqli($db);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$userid = "";
$userName = "";


if (CheckLogin() == TRUE) {
    $userName = $_SESSION['login_user'];
}


$dirname = "resources/";
$images = glob($dirname . "*.jpeg");
$raiting = 0;
$userRaiting = 0;


echo $print;
foreach ($images as $image) {
$name  = substr($image, 10);
    $uploader = "unknown";


    echo '<table>';
    echo '<tr>';
                echo '<th>'.$name.'</th>';
              echo '</tr>';
    echo '<tr>';
    echo '<td><img src="' . $image . '" width="200" height="200"/></td>';
    echo '<tr>';
    echo '<td>Raiting ' . $raiting . '</td>';
    echo '<tr>';
    echo '<td> User Raiting ' . $userRaiting . ' </td>';
    echo '<tr>';
    echo '<td> Up loader ' . $uploader . ' </td>';
    echo '<tr>';
    echo '<td>';
    echo '<form name='.$image.' method="post" action="">';
    if (CheckLogin() == TRUE) {
        echo '<select required name = "userSelectRaiting" >
  	<option value = "-" > -</option >
 	 <option value = "1" > 1</option >
 	 <option value = "2" > 2</option >
 	 <option value = "3" > 3</option >
 	 <option value = "4" > 4</option >
 	 <option value = "5" > 5</option >
	</select >
	<input type = "submit" >
	</form >
	 </td>';
    }
    echo '</tr>';

}
echo '</table>';
if (isset($_POST['userSelectRaiting'])) {
    $imagename = $_POST['$image'];
    $userSelectRaiting = $_POST["userSelectRaiting"];
    imageRaiting($imagename, $userSelectRaiting);
}
?>