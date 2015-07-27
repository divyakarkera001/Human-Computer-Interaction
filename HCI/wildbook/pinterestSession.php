<?php
session_start();
function isLoggedIn()
{
    if(isset($_SESSION['valid']) && $_SESSION['valid'])
        return true;
    return false;
}

function getUserID()
{
	if(isLoggedIn())
	{
		return $_SESSION['userid'];
	}
}
?>