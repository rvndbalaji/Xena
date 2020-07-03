<?php

//prevent access if they haven’t submitted the form.
if (!isset($_POST['submit'])) 
{
 die(header("Location: failed"));
}
session_start();
//Code to send email

$name = $_POST['name'];
$email = $_POST['email'];
$mesg = $_POST['msg'];

// Please specify your Mail Server - Example: mail.example.com.
ini_set("SMTP",$email);

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","25");

//Specifying Return Address to use
ini_set('sendmail_from', $email);

if(mail("aravind.balaji@live.com","Xena feedback - ".$name,$mesg,"From : ".$email))
{
   die(header("Location: success"));
}
else die(header("Location: failed"));
?>