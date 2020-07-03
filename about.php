<?php
require_once("Header.php");
?>

<style>

body
{
	background-position: center left bottom;
	background-repeat: no-repeat;
	background-image: url("<?php echo location();?>Images/books1.jpg"); 	
	background-attachment: fixed;
}

#abt_cont
{
	animation-name: appear;
	animation-duration: 2s;
}

</style>
<br>

<div id="abt_cont">

<div id="abt_text_div"><span id="abt_quot">Learn. Share. Explore</span></div><br>
<span id="abt_text">
Xena's mission is to share and grow the world's knowledge of all kinds by creating, exploring and discussing ideas with people all over the world. 
</span>
</div>


</body></html>


<script type="application/javascript">
$(document).ready(function(e) 
{    
//Anmimating XENA TEXT on Header from left to right and vice-versa

		 $('#Title').css('animation-duration','0s');
		 $('#Title').css('margin-left','47%');
		 $('#Title').css('display','inline');
		 $('#srch_box').css('display','none');		
		 
});

</script>