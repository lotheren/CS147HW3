<?php

session_start();
define('__ROOT__', "/Applications/MAMP/htdocs/hw3");
require(__ROOT__ . "/controllers/Config.php");
require(__ROOT__ . "/controllers/CheckLogin.php");



$mysqli = new mysqli($db);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if(CheckLogin()==TRUE)
{
    header("location:/hw3/index.php");
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT userid FROM Users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $error = "Your Login Name already in use ";

    } else {
        $sql = "INSERT INTO users (username, password)
                VALUES ('$myusername', '$mypassword')";
        if ($db->query($sql) === TRUE) {
            echo "New user created successfully";



        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

        $db->close();
    }
}

?>
