<?php
//Syntax for myql_connect();
//mysql_connect('hostname','username','password');
 
$host='localhost';
$user='rvnd.balaji';
$pass='';
$db='learning';
$err="<strong>Error </strong>: Failed to connect to database <strong>$db</strong>";

if(!@mysql_connect($host,$user,$pass) || !@mysql_select_db($db))
{
	
}

?>