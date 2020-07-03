<?php
require_once("Header.php");
?>

<style>
body
{
	background-position: center;
	background-repeat: no-repeat;
	background-image: url("<?php echo location();?>Images/help.jpg");
	background-attachment: fixed;
}

</style>
<br>

<div id="abt_cont">

<div id="abt_text_div">
<span id="abt_quot">We're listening...</span></div>
<span id="abt_text"> <div id="min">
If you have any queries, please send us a feedback and we'll assist you every way possible.
</div>
</span>

<style>
#abt_cont  /*Container for About Box*/
{
	color:Black;	
	animation-name: appear;
	animation-duration: 1s;
	text-shadow: 0px 0px 20px White;
	padding: 1%;	
	width: 60%;
	margin: 0 auto;
	font-size: 110%;	
}



#min /* Heading of About Box*/
{	
	padding-top:10px;	
}
</style>

</div>

<div id ="form_cont">
<form id="fb" action="<?php echo getRoot();?>send_email.php" method="post">

<label for="name" class="label">Enter your name : </label><br>
<input type="text" id="name" class="input" size="25%" name="name" disabled><br><br>

<label for="email" class="label">E-mail address: </label><br>
<input type="text" id="email" class="input" size="25%" name="email" disabled>

<br><br>

<label for="name" class="label">Your message : </label><br>
<textarea id="msg" class="input" cols="60" rows="8" name="msg" disabled></textarea>
<br><br>
<input type="submit" id="submit" value="Send Feedback" name="submit">

<div id="fb_error">
<span id="eid_1">Feeback is currently disabled. Sorry for the inconvenience.</span><br>
Click here to send feedback directly to <span id="eid_2"><a href="mailto:aravind.balaji@live.com?Subject=Xena%20Feedback">aravind.balaji@live.com</a></span></p>
</div>
</form>

<script type="text/javascript">

$(document).ready(function()
{
 
          $('#srch_box').css('display','none');
		 $('#Title').css('margin-left','47%');		 
		 $('#Title').css('animation-duration','0s');
		 $('#Title').css('display','inline');
		
		 
 
 $("form").submit(function()
 {
      var name = $("#name").val();
	  var email = $("#email").val();
	  var msg = $("#msg").val();
	  
	  if(name=='' || email=='' || msg=='')
	  {
		alert("One or more fields have been left blank!\nPlease fill them up");
		return false;
	  }
	 
	 return true;
 });
	
});
</script>

</div>
<br><br><br>
<?php include_once("creators.php"); ?>

</body></html>