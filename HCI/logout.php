


<?php

function logout()
{
    //$_SESSION = array(); //destroy all of the session variables
	//mysql_close($conn);
    session_destroy();
	header('Location: login.php');
}

logout();
?>

