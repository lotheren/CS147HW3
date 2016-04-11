<?php
$sideBar = <<<SIDE
<button type="button" onclick="location.href='/index.php'">Home</button>
<br>
<br>
<button type="button" onclick="location.href='views/login.php'">Sign in</button>
<br>
<br>
<button type="button" onclick=../controllers/logout.php >Sign out</button>
SIDE;

echo $sideBar;

?>