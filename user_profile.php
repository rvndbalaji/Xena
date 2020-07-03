<?php require_once("core.php");

require_once("Header.php");
if(!isLoggedIn())
{
	die("Please log in to see the profile");
}


//Pre-requisites and profile data
$fn = getUserInfo('firstname');
$ln = getUserInfo('lastname');
$un = getUserInfo('username');
require_once('Card.php');

?>
<style>
#img_cover
{	
	background-position: center;
	background-repeat: no-repeat;
	background-image: url("<?php echo location();?>Images/leef.jpg"); 
	width:101%;	
	height: 140px;
	margin:auto;
	margin-top: -1%; 
	color:White;	
	box-shadow: 0px 0px 20px Black;
	text-shadow: 0px 0px 5px Black;
}
.user_img
{
	display: block;		
	box-shadow:0px 0px 20px Black;	
	border-radius: 100%;
	margin-top: 9%;
}
#card
{	
	text-align: left;	
}
#name
{
	font-size: 160%;
}
#info_content
{
	font-weight: normal;	
}


</style>
<div id="img_cover">

<table width="389" height="141" cellpadding="5px" id="card">

<tr id="row">  <!Row starts>
<th width="117" height="90" id="user">

<img src="<?php echo getRoot();?>Images\brin.jpg"  width="110" height="110" alt="Aravind" class="user_img"/></th>
<th width="244" id='user_info'><span id="name"><?php echo $fn." ".$ln;?></span>
<div id="info_content">
	<span id="tag">Talk to me and you'll laugh your lungs out</span>
</div>


 </th> 
      </tr>
      </table>
</div>

<br>
<?php 

$card = new Card();
$card->TitleColor("#424242");
$card->Title_TextColor("White");
$card->BodyColor("White");
$card->Body_TextColor("RoyalBlue");
$body = "
<ul style='list-style-type:none'>
<li></li>
</ul>
";
$card->create("About $fn",$body,"30%");

?>








