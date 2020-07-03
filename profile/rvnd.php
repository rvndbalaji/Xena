<?php require_once("../user_profile.php"); 



function CreateUserFile()
{
	$user_name = "Aravind";
	$file = fopen($user_name.".php","w") or die("Unable to open file");
	$content = "
	<?php require_once('../user_profile.php'); 
	";
	fwrite($file,$content);
	fclose($file);	
}

?>

<input type="submit" value="Create userfile" onClick="<?php CreateUserFile();?>">


