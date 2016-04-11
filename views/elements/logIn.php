<?php
include("/hw3/controllers/DBConfig.php");
session_start();

$mysqli = new mysqli($db);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT userid FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $_SESSION['login_user'] = $myusername;
        header("location: /hw3/index.php");

    } else {
        $error = "Your Login Name or Password is invalid ";
    }
}
?>
<html>
<div class="wrapper">
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="/hw3/styles/login.css">
</head>

<body>

<div class="title">
    <b>Login</b></div>
    <form action="" method="post">
        <label>UserName :</label><input type="text" name="username" class="box"/><br/><br/>
        <label>Password :</label><input type="password" name="password" class="box"/><br/><br/>
        <input type="submit" value=" Submit "/><br/>
    </form>
    <div class="error">
        <?php echo $error; ?>
    </div>
</div>
</body>
</html>