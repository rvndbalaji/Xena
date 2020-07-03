<?php require_once("Header.php"); ?>

<link rel="stylesheet" type="text/css" href="<?php echo getRoot();?>xena_login.css">

<?php
require_once("xena_db_connect.php");
require_once("core.php");
echo "<br>";
?>


<?php
if(isLoggedIn())
 	{
	   header("Location: home");		
	}
?>


<?php
if(
	isset($_POST['full_name']) &&
	isset($_POST['user_name']) &&
	isset($_POST['pw']) &&
	isset($_POST['email'])
)
{
	$full_name = $_POST['full_name'];
	$user_name = $_POST['user_name'];
	$pw = $_POST['pw'];
	$email = $_POST['email'];
	
	
	if(
		!empty($full_name) &&
		!empty($user_name) &&
		!empty($pw) &&
		!empty($email)
	)
	{		
		//UserName Validation
		if(!un_validate($user_name))
		{
			echo showError("Username can contain alphabets, numbers, underscores, full stops and must start with an alphabet only");	
		}
		else
		{		//Password Validation	
				if(strlen($pw)<4)
				{
					echo showError("Your password must be 4 or more characters long");
				}
				else
				{
					
					//Email Validation
					if(!email_validate($email))
					{
						echo showError("Your email address seems to be invalid");
					}
					else
					{
						register($full_name,$user_name,$pw,$email);
					}
				
				}
		}
		
	}
	else
	{
		echo showError("Something went wrong with your form, please try again.");
	}
		
}

function register($full_name,$user_name,$pw,$email)
{	

	$query = "SELECT username FROM users WHERE username='".$user_name."'";
	if(doQuery($query))
	{
		echo showError("We\'re sorry, but the specified username is already in use by someone else. Try a different one");
	}
	else
	{
		
		$query = "INSERT INTO users VALUES('','$user_name','$pw','$full_name','X','$email')";
		if($query_run=mysql_query($query))
		{
			if(CreateUserFile($user_name,$pw,$full_name,$email))
			{	
				PerformLogin($user_name,$pw);
			}	
			else echo showError("Something really bad happend. Please contact support!");
		}
		else
		{
			echo showError("Oops, we messed up. We were unable to register you at this time, please try again later");
		}
		
	}
}


function CreateUserFile($user_name,$pw,$full_name,$email)
{

	$file = fopen($user_name.".php","w") or die("Unable to open file");
	$content = "Hello Test file";
	fwrite($file,$content);
	fclose($file);	
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


function un_validate($user)
{	
  $re = "/^[A-Za-z][\w\-\.]*$/i";  
  return preg_match($re,$user);  
	
} 	
function email_validate($em)
{	
  $re = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";  
  return preg_match($re,$em);  
	
} 	
function showError($error)
{
	echo "<script type='application/javascript'>
	$(document).ready(function()
	{
		$('#err').css('display','block');
		document.getElementById('err').innerHTML='$error';
	});
	
	</script>
	";	
}

?>


<div id="reg_box">
<div id="head"><span id="head_text">Sign Up</span></div>
<hr><br>

<form id="reg_form" action="<?php echo getRoot();?>register" method="POST">

  
  <span for="full_name" class= "sign_label">Enter your full name </span>
  <input class= "textbox" type="text" id="full_name" name="full_name">
<br><br>

<div id="err_fullname" class="err">No errors</div>

 <span for="user_name" class= "sign_label">Preferred username </span>
  <input class= "textbox" type="text" id="user_name" name="user_name" autocomplete="off"> 
  
  <br><br>
<div id="err_username" class= "err">No errors</div>


<span for="pw" class= "sign_label">Choose a password </span>
  <input class= "textbox" type="password" id="pw" name="pw" autocomplete="off">
<br><br>

<div id="err_password" class= "err">No errors</div>

<span for="email" class= "sign_label">Your email address </span> 
  <input class= "textbox" type="text" id="email" name="email">
<br><br>
<div id="err_email" class= "err">No errors</div>
<div id="err" class= "err">No errors</div>  

<button type="submit" id= "register_btn" name="register_btn" value = "Sign Up" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Sign Up</button>


</form>

<hr>
<a href="<?php echo getRoot();?>home"><button type="button" id= "login_btn_small" name="login_btn" value = "Login" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">User Login</button></a>
<br>


<style>
.sign_box
{
 width: 50%;
}
	

#register_btn
{	
	color: Black;
}
#login_btn_small
{
	padding: 0.3%;	
	font-size: 110%;
	border-radius: 0px 0px 0px 0px;
}

#Title
{
	display: block;
}


</style>

<script type="application/javascript">


$(document).ready(function() 

						
{
	$("input").val("");
	
	$("#Title").css('display','inline');

	 $("#full_name").focus();


 
$("#full_name").focusout(function(e) 	
	{	
		$("#full_name").css("text-transform","capitalize");		
	});

 
 $("#full_name").on("input",function()
	{			
     	resetError("fullname");
    });
	
	
		   
   
   $("#user_name").keyup(function(e) 
   {
   		var un = $(this).val();
		
	if(un!="")
	{
			if(user_validate(un))
			{
						if(un.length>=4)
						{						
							ajax_checkusername(un);
						}
						else
						{
							$("#err_username").css('display','block');					
							document.getElementById('err_username').innerHTML = "A little longer...";
							return
						}
						
					
			}
			else
			{
				$("#err_username").css('display','block');					
			document.getElementById("err_username").innerHTML="Username can contain alphabets, numbers, underscores, full stops and must start with an alphabet only";
			}
			
	}
	else
	{	
		$("#err_username").css('display','none');		
		document.getElementById('err_username').innerHTML = "No errors";
	}
		
   });

	
function ajax_checkusername(un)	
{
  $.post('check_un.php',{'username':un},function(data)
				  {	
				  
					  if(data==1)
					  {		
						  
						  $("#err_username").css('display','block');					
						  document.getElementById('err_username').innerHTML = "Sorry, this username belongs to someone else";
					  }	
					  else
					  { 	
						  document.getElementById('err_username').innerHTML="No errors";		
						  $("#err_username").css('display','none');	
					  }
				  
				  
				  });
}
	
$("#pw").on("input",function()
	{	
		
	   var pass = $(this).val();	
	  if(pass!="")
	  {
		  	if(pass.length >=4) 
				{
					resetError("password");	   	
				}
				else
				{
					$("#err_password").css("display","block");
					document.getElementById("err_password").innerHTML="A little longer...";
					 
				}
				   			   
					   	   
	 }
	 
	  else
	  {
		  resetError("password");	
	  }
     	
    });
	
function user_validate(user)
{	
  var re =/^[A-Za-z][\w\-\.]*$/i;		
  return re.test(user);   
	
} 	
		
   function email_validate(email)
{
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
   
   $("#email").on("input",function(e) 
   {
	   $("#email").css("text-transform","lowercase");	
	   var emaila = $(this).val();	
					
		if(emaila!="")
		{
			if(email_validate(emaila))
			{
				$.post('check_un.php',{'email':emaila},function(data)
				{				
				
					if(data==1)
					{		
						
						$("#err_email").css('display','block');						
				document.getElementById('err_email').innerHTML = "Sorry, this email address is already in use";
					}
					else
					{
							
						document.getElementById('err_email').innerHTML="No errors";												
						$("#err_email").css('display','none');							
					}
				
				
				});
		}
		else
		{
		$("#err_email").css('display','block');		
		document.getElementById('err_email').innerHTML = "That doesn't look like an email address";
			
		}
		
		
	} //End of email address validation	
	else
	{		
		$("#err_email").css('display','none');		
		document.getElementById('err_email').innerHTML = "No errors";
	}
	
	
	
   });
	
  function resetError(Error)
	{
		
		switch(Error)
		{
			case "fullname" : $("#err_fullname").css("display","none");
		                       document.getElementById('err_fullname').innerHTML="No errors";
							  
							   break;
			case "username" : $("#err_username").css("display","none");
		                       document.getElementById('err_username').innerHTML="No errors";					   
							   break;
			case "password" : $("#err_password").css("display","none");
		                       document.getElementById('err_password').innerHTML="No errors";					  
							   break;
			case "email" : $("#err_email").css("display","none");
		                       document.getElementById('err_email').innerHTML="No errors";						   
							   break;			
		}
		
		
	}

 $("#reg_form").submit(function()
 {	  	 		
		 var fullname = $("#full_name").val();	 
		 var username = $("#user_name").val();
		 var password = $("#pw").val();
		 var email = $("#email").val();		
			 
		if(fullname=='')
		{	   
		   $("#err_fullname").css("display","block");
		   document.getElementById("err_fullname").innerHTML="Please specify your full name";
		   return false;
		}
		
		else if(username=='')
		{
		   $("#err_username").css("display","block");
		   document.getElementById("err_username").innerHTML="Please choose a user name";
		   return false;
		}
		else if(password=='')
		{	
		 $("#err_password").css("display","block");   
		   document.getElementById("err_password").innerHTML="Please choose a password";
		   return false;
		}
		else if(email=='')
		{
		 
		  $("#err_email").css("display","block");
		   document.getElementById("err_email").innerHTML="Please mention your email address";
		   return false;
		}
		
		else
		{		
		if(!(document.getElementById('err_username').innerHTML=="No errors" &&	document.getElementById('err_email').innerHTML=="No errors"	&& 	document.getElementById('err_fullname').innerHTML=="No errors"	&&	document.getElementById('err_password').innerHTML=="No errors"))
		{
			return false;	
		}	
				
				$(".err").css("display","none");
				return true;		
		}
		
	
	
			 
	  }); 



 	
});




</script>
</div>
<noscript>
<style>
#Title
{
	display: none;
}
</style>
</noscript>
