
<?php
require_once("xena_db_connect.php");
?>


<?php

if(isset($_POST['username']))
{	
	$field = $_POST['username'];		
	
	if(!empty($field))
	{
    	echo checkProfileExists($field);	
	}
}
 if(isset($_POST['email']))
{
	$email_field = $_POST['email'];		
	
	if(!empty($email_field))
	{
    	echo checkEmailExists($email_field);	
	}
}

?>
<?php
function checkProfileExists($field)  //username or example@example.com as input
{			
	  $query = "SELECT username FROM users WHERE username='".$field."'";
	  return doQuery($query);
}



function checkEmailExists($email_field)
{
		$query1 = "SELECT email FROM users WHERE email='".$email_field."'";				 
		return doQuery($query1);
}


function doQuery($query)
{
	if($query_run = mysql_query($query))	   
	  {
			if(mysql_num_rows($query_run)==1)
			 {				  	 
				   			
				  return true;
			 }			 
			 
	  }
	  
	else
	{
		return false;
	}
}
?>

