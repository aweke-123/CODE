<?php
	//Start session
	session_start();
 
	//Include database connection details
	require_once('connection.php');
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$email_login = clean($_POST['email_login']);
	$password_login = clean($_POST['password_login']);
 
	/*//Input Validations
	if($email_login == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	if($password_login == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}*/   //used required attribute for validation
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: signup.php");
		exit();
	}
 
	//Create query
	$qry="SELECT * FROM member WHERE email='$email_login' AND password='$password_login'";
	$result=mysql_query($qry);
 
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['mem_id'];
			$_SESSION['SESS_EMAIL_LOGIN'] = $member['email'];
			$_SESSION['SESS_PASSWORD_LOGIN'] = $member['password'];
			session_write_close();
			header("location: home.php");
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'Email and password not found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: signup.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
?>