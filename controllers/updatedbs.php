<?php
session_start();
define('__ROOT__', "/Applications/MAMP/htdocs/hw3");
require(__ROOT__ . "/controllers/Config.php");


$user = $_SESSION['login_user'];

$mysqli = new mysqli($db);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$user = $_SESSION['login_user'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userSelectRaiting = mysqli_real_escape_string($db, $_POST['userSelectRaiting']);
    $sql = "SELECT userid FROM Users WHERE username = '$user'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {

            $sql = "INSERT INTO images (imagename, userid,userraiting)
                VALUES ('$name', '$user', '$userSelectRaiting')";
            if ($db->query($sql) === TRUE) {
                echo "Raiting recorded!";


            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }

            $db->close();

    } else {
        $error = "Some error. ";
    }
}
?>
