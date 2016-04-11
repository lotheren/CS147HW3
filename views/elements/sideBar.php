<?php
session_start();
$sideBar = <<<SIDE
<button type="button" onclick="location.href='/hw3/index.php'">Home</button>
<br>
<br>
<button type="button" onclick="location.href='/hw3/views/elements/signuppage.php'">Sign up</button>
<br>
<br>
<button type="button" onclick="location.href='/hw3/views/elements/loginpage.php'">Sign in</button>
<br>
<br>
<button type="button" onclick="location.href='/hw3/views/elements/logoutpage.php'">Sign out</button>
SIDE;

echo $sideBar;

?>