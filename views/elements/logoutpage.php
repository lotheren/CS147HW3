<?php
session_start();
session_destroy();
session_write_close();
session_regenerate_id(true);
$_SESSION = array();
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
        <p>You have been logged out. Please hit the home button to go to the main page. </p>
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

