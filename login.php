<link rel="stylesheet" type="text/css" href="<?php echo getRoot();?>xena_login.css">
<?php

require_once("xena_db_connect.php");
require_once("core.php");
echo "<br>";
					
if(isset($_POST['un']) && isset($_POST['pw']))
{
	if(!empty($_POST['un']) && !empty($_POST['pw']))
	{
		$user = $_POST['un'];
		$pass = $_POST['pw'];
		
		 echo "<script type='application/javascript'>
			 	$(document).ready(function()
				{
					$('#un').val(\"$user\");
				
				});</script>";
	
				if(PerformLogin($user,$pass))
				{
					disErr();	
				}
		
		
	}
}
    function disErr()
	{
		 echo "<script type='application/javascript'>
					$(document).ready(function()
					{
					   $('#err').css('display','block');
   		               document.getElementById('err').innerHTML='Incorrect Username or Password';	
					});
					</script>";		
	}

	?>

<div id="login_box">
<div id="head"><span id="head_text">Login</span></div>
<hr><br>

<form id="login_form" action="<?php echo getRoot();?>home" method="POST">

  <span for="un" class= "login_label">Username </span>
  <input class= "textbox" type="text" id="un" name="un">
  
  
  
  <br><br>
  
  <span for="pw" class= "login_label">Password </span>
  <input class= "textbox" type="password" id="pw" name="pw">
<br><br>

<div id="err" class= "err">No errors</div>  


<div id="rmmbr_text"><label for="rmmbr" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" id='rmmbr_label'><input type="checkbox" id="rmmbr" name="rmmbr" class='mdl-checkbox__input'><span class="mdl-checkbox__label">Remember me on this computer</span></input></label></div>
<br>



<button type="submit" id= "login_btn" name="login_btn" value = "Login" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Login</button>
</form>

<hr>
<div id='below_login'>

<a href="<?php echo getRoot();?>register" class="login_label" id="reg_btn" name='reg_btn'>Sign Up</a>

<a href="#" id="iforgot">I forgot my password</a>
</div>
<script type="application/javascript">
$(document).ready(function() 
{
	
	
 $("#un").focus();
 
 $("#un,#pw").on("input",function()
	{
		if(document.getElementById("err").innerHTML=="Username or password cannot be blank")
		{
         resetErrors();				
		}
    });
	
  function resetErrors()
	{
		$("#err").css("display","none");	
						
	}

 $("#login_form").submit(function()
 {	 
     
     var username = $("#un").val();
	 var password = $("#pw").val();
	 
	if(username=='' || password=='')
	{
	   $("#err").css("display","block");
	   document.getElementById("err").innerHTML="Username or password cannot be blank";
	   return false;
	}
	else
	{		
		return true;
	}
	     
  }); 



});

</script>
</div>