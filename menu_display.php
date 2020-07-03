<style>
#lo
{
	color:White;
	text-decoration: none;
     display: none;
	 padding: 5px;			 
	 transition:background-color 400ms, box-shadow 400ms;
	 font-size: 80%;
	margin-top:10px;
	 
}

#lo:hover
{
    background-color: #C92326;
	box-shadow: 0px 0px 10px Red;
	
}

#srch_bar
{
  padding: 0.3%;	
  font-size: 110%;  
  margin-top:0.5%;
  width: 25%;
  height: 50%;
  font-size: 95%;
  margin-left: -40%;	
  border: 0px;
  border-radius: 2px 0px 0px 2px;
  
}
#srch_icon
{
	
	background: White;
	padding: 0.1%;	
	border: 0px;
	display: inline-block;
    border-radius: 0px 2px 2px 0px;
	
}
#srch_box
{
  display: none;	
}

</style>
<div id='srch_box'>
<input type="text" placeholder="Search" id='srch_bar'><a href="#" id="srch_icon"><img src="<?php echo getRoot();?>Icons/srch_black.png"></a></div>


 <?php $user_name = getUserInfo('firstname')?>
 <?php $un = getUserInfo('username')?>
	
	<ul id='menu'><div id='menu_item'>
	<a href='<?php echo getRoot();?>home' class='green_menu'><img src="<?php echo getRoot();?>Icons/home.png" /> Home</a><a class='green_menu' id='user_menu'>    
	<img src="<?php echo getRoot();?>Icons/userprofile.png" /> <?php echo $user_name?></a>
	<ul id='drop'>
	<div>
	<a href='<?php echo getRoot();?><?php echo "profile/".$un?>' class='green_menu'>My Profile</a>
	<a href='#' class='green_menu'>Settings</a>
	<hr id='one'><a href='<?php echo getRoot();?>about' class='drop_small'>About</a><a href='<?php echo getRoot();?>contact' class='drop_small'>Contact Us</span></a><br><a href='<?php echo getRoot();?>logout' id='lo'>Log Out</a></div>	
</ul></ul>
	
<style>

#one
{
    border: 0;
    height: 1px;    
    background: linear-gradient(#90CAF9,#3F51B5);
	margin:auto;
	display:none;
}

#copyr
{
  font-size:80%;
  background: #90CAF9;
  display: none;
  margin-top:10px;
  padding:5px;
  color:Black;
  
}

#drop
{
	list-style-type:none;	
	margin-top: 9%;
	background-color: #3F51B5;
	width:inherit;	
	margin-left: 0px;
	margin-top: 5%;
	padding: 0px;	
	height: 0px;
	z-index:auto;
}

.drop_small
{	
	float:left;
	margin-top:0px;	
	width: 50%;	
	display:inline;
	padding-bottom:5px;
	padding-top: 5px;	
	transition: border 500ms;
	border-bottom: 2px solid Transparent;	
	font-size: 80%;
	
}


.drop_small:hover
{
   border-bottom: 2px solid #90CAF9;		
}



#drop div a
{
	display: block;
	position: relative;	  
	text-decoration: none;
	color:White;	
	display: none;
   
}


</style>



<script type="application/javascript">
$(document).ready(function(e) 
{    
//Anmimating XENA TEXT on Header from left to right and vice-versa
 $('#srch_box').css('display','inline');
        $('#Title').css('display','block');
		 $('#Title').css('margin-left','0%');
		 $('#Title').css('animation-duration','1.5s');					
		 
				
	
		
//Animation ENDS--------------------------------------------------	

	$("#user_menu").click(function()
		{
			
		
			if($("#drop").height()==0)	
			{
				$("#drop").animate(
					{   		
						height: '161px'
					},250);
					
			   $("#drop div a").css('display','block');
			   $("#one").css('display','block');
			    $("#copyr").css('display','block');
			    
				<?php
				
				if(isLoggedIn())
				{
					 echo "$('#lo').css('display','block');";
				}
				
				 ?>
  				  
			   
			}
			else if($("#drop").height()==161)
			{
				$("#drop").animate(
					{   		
						height: '0px'
					},250);
					
			   $("#drop div a").css('display','none');
               $("#lo").css('display','none');
			   $("#one").css('display','none');
			   $("#copyr").css('display','none');
			  
			}
			
	});


});



</script>
