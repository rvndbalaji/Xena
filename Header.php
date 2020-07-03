
<?php require_once("core.php");?><!doctype html>
<html>
<head>
<title>Project Xena</title>
<link rel="stylesheet" type="text/css" href="<?php echo getRoot();?>xena_style.css">
</head>
<body>
<div id = "Top_Bar">
<div id="header">  
<span id="Title"><a href="home" id='home_link'>Xena</a><br></span>

<!--IF JAVASCRIPT IS DISABLED.............................................-->
<noscript>
<div id='js_dis'>
<span id="js_dis_span"><br>
Xena : <font color="#FFFFFF">
This site requires JavaScript to function properly. <a style="color:White" href="http://enable-javascript.com/" target="_blank"><u>Click here to know how to enable it</u></a>
</font>
</span>
</div>
<style>
#Main_Content
{
	display:none;
}
#menu
{
	display:none;
}

</style>
</noscript>
<!------------->

<style>
#js_dis
{	
 background: #D9484B;
 width:101%;
 height:51.5px; 
 margin-top: -0.5%; 
 margin-left: -0.5%;
 
}


#home_link
{
	text-decoration:none;
	color:#90CAF9;
}


#btn
{
	background:Black;	
}
</style>
<?php


require_once("core.php");
require_once(getCDN()); 

?>



<!----------------------------------------------Displaying the menu----------------------------------->

 
<!---------------------------------------------------------------------------------------------------->

<?php
//DisplayMenu(); 


if(isLoggedIn())
{
require_once("menu_display.php");
}

?>

</div>

</div>
<div id="Main_Content">