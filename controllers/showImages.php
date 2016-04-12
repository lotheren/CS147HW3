<?php

session_start();
define('__ROOT__', "/Applications/MAMP/htdocs/hw3");
require(__ROOT__ . "/controllers/Config.php");
require(__ROOT__ . "/controllers/CheckLogin.php");
//require(__ROOT__ . "/controllers/updatedbs.php");

$mysqli = new mysqli($db);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if (CheckLogin() == TRUE) {
    $userName = $_SESSION['login_user'];
}

$user = $_SESSION['login_user'];
$dirname = "resources/";
$images = glob($dirname . "*.jpg");




echo $print;
foreach ($images as $image) {
    $rating = 0;
    $userRating = 0;
    $uploader = "unknown";
    $dateAdded = 0;
    $numOfVotes = 0;
    $caption = "";

    $name = substr($image, 10);
    $uploader = "unknown";
    $dateAdded = "unknown";

    $sql = "SELECT userraiting FROM images WHERE username = '$user' and imagename = '$name'";
    $result = mysqli_query($db, $sql);
    while($row = $result->fetch_assoc()) {
        $userRating =  $row["userraiting"];
    }

    $sql = "SELECT userraiting FROM images WHERE imagename = '$name'";
    $result = mysqli_query($db, $sql);
    while($row = $result->fetch_assoc()) {
        $numOfVotes++;
        $rating +=  $row["userraiting"];
    }
    $rating = $rating / $numOfVotes;

    $sql = "SELECT user FROM userimage WHERE imagename = '$name'";
    $result = mysqli_query($db, $sql);
    while($row = $result->fetch_assoc()) {
        $uploader = $row["user"];
    }
    $sql = "SELECT date FROM userimage WHERE imagename = '$name'";
    $result = mysqli_query($db, $sql);
    while($row = $result->fetch_assoc()) {
        $dateAdded = $row["date"];
    }
    $sql = "SELECT caption FROM userimage WHERE imagename = '$name'";
    $result = mysqli_query($db, $sql);
    while($row = $result->fetch_assoc()) {
        $caption = $row["caption"];
    }

    echo '<table>';
    echo '<tr>';
    echo '<th>' . $name . '</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><img src="' . $image . '" width="500px" height="500px"/></td>';
    echo '<tr>';
    echo '<td>Caption: ' . $caption . '</td>';
    echo '<tr>';
    echo '<td>Rating: ' . $rating . '</td>';
    echo '<tr>';
    echo '<td> User Rating: ' . $userRating . ' </td>';
    echo '<tr>';
    echo '<td> Uploader: ' . $uploader . ' </td>';
    echo '<tr>';
    echo '<td> Date Added: ' . $dateAdded . ' </td>';
    echo '<tr>';
    echo '<tr>';
    echo '<tr>';
    echo '<td>';
    echo '<form name=' . $image . ' method="post" action="">';
    if (CheckLogin() == TRUE) {
        echo '<select required name = "userSelectRating" >
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


    echo '</table>';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userSelectRaiting = mysqli_real_escape_string($db, $_POST['userSelectRaiting']);


            $sql = "SELECT imagename FROM images WHERE username = '$user' and imagename = '$name'";
            $result = mysqli_query($db, $sql);
            $count2 = mysqli_num_rows($result);

            if ($count2 < 1) {

                $sql = "INSERT INTO images (imagename, username,userraiting)
                VALUES ('$name', '$user', '$userSelectRaiting')";
                if ($db->query($sql) === TRUE) {
                    echo "Raiting recorded!";

                }
                $db->close();
            }else {echo "Already rated."; }

        } else {
            $error = "Some error. ";
        }


}
?>