
<?php require_once("Header.php"); 


if(isLoggedIn())
{
  echo "Logged In";	    
}

else
{	 
  require_once("login.php");   			  	
  echo About();
	
	echo "
	<script type='application/javascript'>
		$(document).ready(function(e) 
	{
	    
		 $('#Title').css('animation-direction','reverse');
		 $('#Title').css('animation-duration','1s');		
		  $('#Title').css('margin-left','47%');
		   $('#Title').css('display','block');
		   
    
	});
		 
	</script>";
	
	
}
ob_end_flush();

?>
<style>

body
{
	background-position: center left bottom;
	background-repeat: no-repeat;
	background-attachment: fixed;
	/*background-image: url("http://localhost/Images/bg2.jpg"); */
	
}

#disc
{
	font-size: 75%;
}
#about_box
{
	width: 42%;
	text-align: center;
	margin: 0 auto;
	
}
#about_box a
{
	font-size: 120%;	
	padding-left:4%;
	padding-right:4%;	
		
}

#copyr
{
	font-size: 110%;	
}

</style>
</body></html>