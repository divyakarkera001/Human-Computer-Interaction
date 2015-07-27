<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
/*echo $fileName;
echo $fileTmpLoc;
echo $fileType;
echo $fileSize;
echo $fileErrorMsg;*/
/*echo "<input type='hidden' id='filename' value='".$fileName."'/>"*/

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}

if(move_uploaded_file($fileTmpLoc, "content/$fileName")){
    echo "<br/>"."$fileName upload is complete";
	echo "<input id='fln' type='hidden' value='".$fileName."'/>";
} else {
    echo "move_uploaded_file function failed";
}
/*if (($_FILES["file"]["size"] < 20000)
{
	if ($_FILES["file"]["error"] > 0)
    {
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
	else
    {
		if (file_exists("C:/inetpub/wwwroot/Pin-up/img/" . $_FILES["file"]["name"]))
		{
		  echo $_FILES["file"]["name"] . " already exists. ";
		}
		else
		{
		  move_uploaded_file($_FILES["file"]["tmp_name"],
		  "C:/inetpub/wwwroot/Pin-up/img/" . $_FILES["file"]["name"]);
		  echo "Stored in: " . "uploades/" . $_FILES["file"]["name"];
		}
    }
}
else
{
  echo "Invalid file";
}*/
?>