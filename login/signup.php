<!DOCTYPE HTML>
<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_CONFIRM_PASSWORD_LOGIN']);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="log.css">
<script type="text/javascript">

function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }
function validateForm()
{
var a=document.forms["reg"]["email"].value;
//var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var b=document.forms["reg"]["password"].value;
var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
var c=document.forms["reg"]["confirm_password"].value;
 if(b!=null && b== c) {
      if(!re.test(b)) {
        alert("The password you have entered is not valid! Please enter at least one number, one lowercase and one uppercase letter and at least six characters");
        reg.password.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      reg.password.focus();
      return false;
    }
    return true;
}
</script>
</head>

<body>
  <div class="login-box">
    <div class="lb-header">
      <a href="#" class="active" id="login-box-link">Login</a>
      <a href="#" id="signup-box-link">Sign Up</a>
    </div>
    <div class="social-login">
      <a href="https://www.facebook.com">
        <i class="fa fa-facebook fa-lg"></i>
        Login in with facebook
      </a>
      <a href="https://www.gmail.com">
        <i class="fa fa-google-plus fa-lg"></i>
        log in with Google
      </a>
    </div>
    <form class="email-login" name="login_form"  action="login_exec.php" method="post">
	
<table width="309" border="0" align="center" cellpadding="2" cellspacing="5">
  <tr>
    <td colspan="2">
		<!--the code bellow is used to display the message of the input validation-->
		 <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
	</td>
  </tr>
</table>  



	 <div class="u-form-group">
        <input type="email" placeholder="Email" name="email_login" required/>
      </div>
      <div class="u-form-group">
        <input type="password" placeholder="Password" name="password_login" required/>
      </div>
      <div class="u-form-group">
        <button name="login_button">Log in</button>
      </div>
	  <!--
      <div class="u-form-group">
        <a href="#" class="forgot-password">Forgot password?</a>
      </div>
       -->
	  </form>
    <form class="email-signup" name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post">
      <div class="u-form-group">
        <input type="email" placeholder="Email" name="email" required/>
      </div>
      <div class="u-form-group">
        <input type="password" placeholder="Password" name="password" required/>
      </div>
      <div class="u-form-group">
        <input type="password" placeholder="Confirm Password" name="confirm_password" required/>
      </div>
      <div class="u-form-group">
        <button name="sign_up">Sign Up</button>
      </div>
    </form>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
<script>
$(".email-signup").hide();
$("#signup-box-link").click(function() {
  $(".email-login").fadeOut(100);
  $(".email-signup").delay(100).fadeIn(100);
  $("#login-box-link").removeClass("active");
  $("#signup-box-link").addClass("active");
});
$("#login-box-link").click(function() {
  $(".email-login").delay(100).fadeIn(100);;
  $(".email-signup").fadeOut(100);
  $("#login-box-link").addClass("active");
  $("#signup-box-link").removeClass("active");
});
</script>
</body>
</html>