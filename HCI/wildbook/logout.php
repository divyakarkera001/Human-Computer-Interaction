<html>
<body>

<?php
include 'pinterestSession.php';
if(isLoggedIn()!=1) //Not Signed In
{
	header('Location: login.html');
}
?>


<?php

function logout()
{
    //$_SESSION = array(); //destroy all of the session variables
	//mysql_close($conn);
    session_destroy();
	header('Location: login.html');
}

logout();
?>

<H3>Thank you for using WildBook. Please visit again!!!</H3>

</body>
</html>