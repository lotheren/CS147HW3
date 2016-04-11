<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
        <title>Top Images</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="styles/site.css">
    </head>

<div class="container">
    <div id="sidebar">
       <?php include 'views/elements/sideBar.php';?>
    </div>
    <div id="header">
         <h1>Image Rating</h1>
    </div>
    <div id="content">
        <div id="center">
                <?php include 'controllers/showImages.php'; ?>
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

