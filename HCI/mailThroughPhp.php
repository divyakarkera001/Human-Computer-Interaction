<?php
ini_set('SMTP','smtp.gmail.com'); 
ini_set('sendmail_from', 'divyakarkera@gmail.com'); 

$to = 'dk2489@nyu.edu';
$subject = 'Example subject';
$body = 'With an example body…'; 

mail($to, $subject , $body);
?>