<?php
session_start();




$sideBar = <<<SIDE
<button type="button" onclick="location.href='/hw3/index.php'">Home</button>
<br>
<br>
<button type="button" onclick="location.href='/hw3/views/elements/loginpage.php'">Sign in</button>
<br>
<br>
<button type="button" onclick="location.href='/hw3/views/elements/signuppage.php'">Sign up</button>

SIDE;

$loggedIn = <<<LOGGED
<button type="button" onclick="location.href='/hw3/index.php'">Home</button>
<br>
<br>
<button type="button" onclick="location.href='/hw3/views/elements/uploadPage.php'">Up Load</button>
<br>
<br>
<button type="button" onclick="location.href='/hw3/views/elements/logoutpage.php'">Sign out</button>
LOGGED;





if( $_SESSION['login_user'] == ""){
    echo $sideBar;

}
else {
    echo $loggedIn;

}


?>


