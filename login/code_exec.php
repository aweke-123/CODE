<?php 
 error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include 'connection.php';
 function NewUser() 
 { 
 
 $email = $_POST['email']; 
 $password = $_POST['password']; 
 $confirm_password = $_POST['confirm_password']; 
 $query = "INSERT INTO member (email,password,confirm_password) VALUES ('$email','$password','$confirm_password')" or die("Error in the consult.." . mysqli_error($bd));  
 $data = mysql_query ($query);
 if($data) 
 { 
 echo "YOUR REGISTRATION IS COMPLETED..."; 
 } 
 } 
 
 function SignUp() { 
 
 $mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "Anj@li1593";
$mysql_database = "simple_login";
$prefix = "";
  $bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

	
 if(!empty($_POST['email'])) //checking the 'user' email which is from Sign-Up.html, is it empty or have some text 
 { 
 
 $query = mysql_query("SELECT * FROM member WHERE email = '$_POST[email]'") or die(mysql_error($bd)); 
 
 if (mysql_num_rows($query) <= 0)
 {
		if(!$row = mysql_fetch_array($query) or die(mysql_error()))
		{ 
			NewUser(); 
		} 
 }
			else
		{ 
			echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
		} 
 } 
 } if(isset($_POST['sign_up'])) 
 { 
SignUp(); 
} ?> 