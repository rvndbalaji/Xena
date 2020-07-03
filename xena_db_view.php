<?php 
require_once('core.php');
require_once(getCDN()); 


?>



<style>
html
{
  overflow-y: scroll;
}
body
{
	font-family: roboto,segoe ui;	
}

#head
{
	
    background: #303F9F;
	color:White;
	margin :auto;
	text-align:center;
	
}

#results
{
 display : none;	
 background: #BBDEFB;
 padding:1%;
 
}

#srch_results
{
	background-color: LightGreen;
	padding: 1%;
	
	
}

#gds_box
{
	 background: #EF9A9A;
	 padding:0.7%;
	 width: 50%;
}

.input
{
  padding:5px;
  width: 300
}

.btn
{
    padding:5px;
   width: 100
}

#dau
{
	padding:0.5%;
}
</style>

<div id="head"><span>
<h1>Xena Users Database</h1>
<h3>Confidential Database</h3>
</span></div>



<strong>Global Database Search:</strong> <br><br>
<div id = "gds_box">

<form action="<?php echo getRoot();?>xena_db_view.php" method="POST">
Search by User ID, Username,Name or Email<br><input type="text" width="200" name="s_un" class = "input">
<input type="submit" value ="Search" name="submit" class = "btn">
</form>


</div>
<br>

<div id = "srch_results">
<strong>Search Results :</strong><br><br>

<span id="dis_res">

<?php

         
	if(isset($_POST['s_un']) && !empty($_POST['s_un']))	  
	{
		$index = $_POST['s_un'];
   //Setting search field with index
  	 echo "<script type='application/javascript'>
	$('.input').val(\"$index\");
	 $('.input').focus();
	</script>"; 
	
		
         $query = "SELECT id,username,password,firstname,lastname,email FROM users WHERE id='$index' OR username='$index' OR firstname='$index' OR lastname='$index' OR CONCAT(firstname, ' ',lastname) = '$index' OR email='$index' ORDER BY id";
           if($query_run=mysql_query($query))
                 {	       			 		
				      $res_num = mysql_num_rows($query_run);			 									  
					 if($res_num!=0)
					 {
						 				if($res_num==1)	
										{
						                  echo "<strong>$res_num result found</strong><br><br>";
										}
										else
										{
 										  echo "<strong>$res_num results found</strong><br><br>";
										}
										  echo"<table width='100%'>";
					 
											echo "<tr align='left'>
										   <th>User ID</th>
										   <th>Full Name</th>
										   <th>Username</th>
										   <th>Password</th>
										   <th>Email</th>
										  </tr>";
										  
									 while($row=mysql_fetch_assoc($query_run)) 
									{
									   $id = $row['id'];
									   $username = $row['username'];
									   $password = $row['password'];
									   $firstname = $row['firstname'];
									   $lastname = $row['lastname'];
									   $email = $row['email'];
									   									  
										  
										  echo "<div><span>
												 <tr>
												 <td>$id</td>
												 <td>$firstname $lastname</td>
												 <td>$username</td>
												 <td>$password</td>
												 <td>$email</td>
												</tr>
											  </span></div>";
											  
										   
									   }
						 echo"</table>";
					 }
					 
					 else echo "No results found for <strong>$index</strong>";
					
       			 }
 		    else
				 {
					echo "Error displaying results" ;
				 }
	

	}
	else echo "No results found";
	
?>
</span>

</div>


<br><br>









<input type="submit" value = "Show All Users" id="dau"><br><br>

<div id= "results">
<?php require_once("get_users.php"); ?>
</div>


<script type="application/javascript">
$(document).ready(function() 
{
    
	$("#dau").click(function()
	{
        var display =  $("#results").css("display");		
	    
		if(display=="none")
		{
			$("#results").css("display","block");	
			$("#dau").val("Hide All Users");
			
		
		}
		
		else if(display=="block")
		{
			$("#results").css("display","none");	
			$("#dau").val("Show All Users");
		}
			
			
	});
	
	
	
	   
});

</script>


</html>