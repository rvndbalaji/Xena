<?php

require_once("xena_db_connect.php");
ob_start();
session_start();

$current_file = $_SERVER['SCRIPT_NAME'];
//$http_referer = $_SERVER['HTTP_REFERER'];

function location()
{
	$location = "http://localhost/";
	return $location;
}
function getRoot()
{
	$root = location()."Project Xena/";
	return $root;
}

function getCDN()
{
   	$cdn = "C:\\xampp\\htdocs\\cdn_links.php";
	return $cdn;
}

function isLoggedIn()
{
		 if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		{
		 return true;
   		}
		else return false;
}

function getUserInfo($field)
{
	$id = $_SESSION['user_id'];
	$query = "SELECT $field FROM users WHERE id='$id' ORDER BY id";
	if($query_run = mysql_query($query))
	{
	  return mysql_result($query_run,0,$field);
	}
	else
	{
		return "NonExist";
	}
}

function About()
{
	$about =  "<br><br><div id='about_box'><a href='about' class='hyperlink'>About</a><a href='contact' class='hyperlink'>Contact Us</a><br><br><span id='copyr'>©2015 Xena Inc.</span><p id='disc'>This website works best in Microsoft Edge</div>";
	return $about;
}



function PerformLogin($user,$pass)
{
		$query = "SELECT id FROM users WHERE username='$user' AND password='$pass' ORDER BY id";
		
		if($query_run = mysql_query($query))
		{
		    	$num_rows = mysql_num_rows($query_run);	
  				
			if($num_rows==1)
			{	
				$result = mysql_result($query_run,0,'id');
				
				//Session has started. Set appearance 
						
				$_SESSION['user_id'] = $result;	
				
				header("Location: home");
				
				
			}
			else if($num_rows==0)
				{				   
				  disErr();
				}
				
		}
}

?>