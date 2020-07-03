<style>
ul
{
	list-style-type:none;
}
</style>

<?php

$query = "SELECT id,username,password,firstname,lastname,email FROM users ORDER BY id";

if($query_run=mysql_query($query))
{
 
  echo"<table width='100%'>";
     
echo "<tr align='left'>
       <th>User ID</th>
       <th>Full Name</th>
	   <th>Username</th>
	   <th>Password</th>
	   <th>Email</th>
      </tr>";
	while($row = mysql_fetch_assoc($query_run))
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


else
{
	echo "Error displaying results";
}


?>