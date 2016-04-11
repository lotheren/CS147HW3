<?php
/**
 * Created by PhpStorm.
 * User: kaigen
 * Date: 4/11/16
 * Time: 12:10 AM
 */

function CheckLogin()
{
    session_start();
    if( $_SESSION['login_user'] == ""){
        return FALSE;
    }
else return TRUE;


}

?>