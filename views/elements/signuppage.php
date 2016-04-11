<?php

session_start();
define('__ROOT__', "/Applications/MAMP/htdocs/hw3");
require(__ROOT__ . "/models/signupdatabase.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("location:/hw3/index.php");

}

?>

<html>
<div class="wrapper">
    <head>
        <title>Sign Up Page</title>
        <link rel="stylesheet" type="text/css" href="/hw3/styles/login.css">
    </head>

    <body>

    <div class="title">
        <b>Sign Up</b></div>
    <form action="" method="post">
        <label>UserName :</label><input type="text" name="username" class="box"/><br/><br/>
        <label>Password :</label><input type="password" name="password" class="box"/><br/><br/>
        <input type="submit" value=" Submit "/>
        <button type="button" onclick="location.href='/hw3/index.php'">Home</button><br/>


    </form>
    <div class="error">
        <?php echo $error; ?>
    </div>

</div>
</body>
</html>
